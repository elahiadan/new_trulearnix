<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Stripe\Stripe;
use Stripe\Webhook;

class StripeWebhookController extends Controller
{
    public function handle(Request $request)
    {
        $payload    = $request->getContent();
        $sigHeader  = $request->header('Stripe-Signature');
        $endpointSecret = env('STRIPE_WEBHOOK_SECRET');

        if (!$endpointSecret) {
            // As a safety net, reject if secret not set in prod
            abort(500, 'Stripe webhook secret not configured');
        }

        try {
            $event = Webhook::constructEvent($payload, $sigHeader, $endpointSecret);
        } catch (\UnexpectedValueException $e) {
            return response('Invalid payload', 400);
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            return response('Invalid signature', 400);
        }

        // Handle the event
        switch ($event->type) {
            case 'payment_intent.succeeded':
                $this->handlePaymentSucceeded($event->data->object);
                break;

            case 'payment_intent.payment_failed':
                $this->handlePaymentFailed($event->data->object);
                break;

            case 'charge.refunded':
                $this->handleRefunded($event->data->object);
                break;

            default:
                // Optional: log unhandled types for visibility
                Log::info('Unhandled Stripe event type: ' . $event->type);
        }

        return response('Webhook handled', 200);
    }

    protected function handlePaymentSucceeded($paymentIntent)
    {
        $piId     = $paymentIntent->id;
        $orderId  = $paymentIntent->metadata->order_id ?? null;

        // Find by metadata order_id first, fallback to stripe_payment_id lookup
        $orderQuery = Order::query();
        if ($orderId) $orderQuery->where('id', $orderId);
        $order = $orderQuery->orWhere('stripe_payment_id', $piId)->first();

        if (!$order) {
            Log::warning('Order not found for payment_intent: ' . $piId);
            return;
        }

        // Idempotent: only move pending -> paid
        if ($order->payment_status === Order::STATUS_PAID) {
            return;
        }

        DB::transaction(function () use ($order) {
            // Reduce stock now that payment is successful
            foreach ($order->items as $item) {
                Product::where('id', $item->product_id)->lockForUpdate()->first()?->decrement('stock', $item->quantity);
            }

            $order->update([
                'payment_status' => Order::STATUS_PAID,
            ]);
        });

        // (Optional) dispatch events, notifications, emails here
        // event(new OrderPaid($order));
    }

    protected function handlePaymentFailed($paymentIntent)
    {
        $piId    = $paymentIntent->id;
        $orderId = $paymentIntent->metadata->order_id ?? null;

        $orderQuery = Order::query();
        if ($orderId) $orderQuery->where('id', $orderId);
        $order = $orderQuery->orWhere('stripe_payment_id', $piId)->first();

        if (!$order) return;

        if ($order->payment_status === Order::STATUS_PENDING) {
            $order->update(['payment_status' => Order::STATUS_FAILED]);
        }
    }

    protected function handleRefunded($charge)
    {
        // charge.payment_intent is present on charge objects
        $piId = $charge->payment_intent ?? null;
        if (!$piId) return;

        $order = Order::where('stripe_payment_id', $piId)->first();
        if (!$order) return;

        // You could increment stock back or create a separate returns flow
        $order->update(['payment_status' => Order::STATUS_REFUNDED]);
    }
}
