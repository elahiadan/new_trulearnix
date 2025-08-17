<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Stripe\PaymentIntent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Stripe\Checkout\Session as StripeSession;

class StripeController extends Controller
{
    public function createPaymentIntent(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return response()->json(['message' => 'Cart empty'], 422);
        }

        // Calculate total strictly server-side using product prices from DB
        $productIds = array_map(fn($i) => $i['id'], $cart);
        $products   = Product::whereIn('id', $productIds)->get()->keyBy('id');
        
        $total = 0;
        foreach ($cart as $item) {
            if (!isset($products[$item['id']])) continue;
            $price = (float) $products[$item['id']]->price; // authoritative price
            $qty   = (int) $item['quantity'];
            $total += $price * $qty;
        }
        $currency = 'usd';
        
        // Wrap in transaction
        $order = DB::transaction(function () use ($total, $currency, $cart, $products) {
            $order = Order::create([
                'user_id'           => auth()->id(),
                'total_amount'      => $total,
                'currency'          => $currency,
                'payment_status'    => Order::STATUS_PENDING,
                'stripe_payment_id' => null,
            ]);

            foreach ($cart as $item) {
                if (!isset($products[$item['id']])) continue;
                OrderItem::create([
                    'order_id'   => $order->id,
                    'product_id' => $item['id'],
                    'quantity'   => (int)$item['quantity'],
                    'price'      => (float)$products[$item['id']]->price, // snapshot
                ]);
            }

            return $order;
        });

        $paymentIntent = PaymentIntent::create([
            'amount'   => (int) round($total * 100),  // cents
            'currency' => $currency,
            'metadata' => [
                'order_id' => (string)$order->id,
                'user_id'  => (string)auth()->id(),
            ],
        ]);

        $order->update([
            'stripe_payment_id'   => $paymentIntent->id,
            'stripe_client_secret' => $paymentIntent->client_secret,
        ]);

        return response()->json([
            'clientSecret' => $paymentIntent->client_secret,
            'order_id'     => $order->id,
        ]);
    }

    // Optional: Show a thank-you page. Do NOT mark paid here anymore.
    public function success(Request $request)
    {
        // Just display a polite "Thanks" — webhook will confirm payment.
        return view('payment.success');
    }

    public function cancel()
    {
        return view('payment.cancel');
    }



    // WITHOUT WEBHOOK


    // public function createPaymentIntent(Request $request)
    // {
    //     Stripe::setApiKey(env('STRIPE_SECRET'));
    //     $cart = session()->get('cart', []);
    //     $amount = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart)) * 100;

    //     $paymentIntent = PaymentIntent::create([
    //         'amount' => $amount,
    //         'currency' => 'usd',
    //     ]);

    //     return response()->json(['clientSecret' => $paymentIntent->client_secret]);
    // }

    // public function success(Request $request)
    // {
    //     $cart = session()->get('cart', []);
    //     $total = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));

    //     $order = Order::create([
    //         'user_id' => auth()->id(),
    //         'total_amount' => $total,
    //         'payment_status' => 'paid',
    //         'stripe_payment_id' => $request->get('payment_intent')
    //     ]);

    //     foreach ($cart as $item) {
    //         OrderItem::create([
    //             'order_id' => $order->id,
    //             'product_id' => $item['id'],
    //             'quantity' => $item['quantity'],
    //             'price' => $item['price']
    //         ]);
    //     }

    //     session()->forget('cart');
    //     return view('payment.success', compact('order'));
    // }

    public function checkout(Product $product)
    {
        $currency = strtoupper(session('currency') ?? 'INR');
        $amount = convertPrice($product->price_inr, $currency);
        $amountMinor = intval(round($amount * 100)); // Stripe needs smallest currency unit

        Stripe::setApiKey(config('services.stripe.secret'));

        $session = StripeSession::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => $currency,
                    'unit_amount' => $amountMinor,
                    'product_data' => [
                        'name' => $product->name,
                    ],
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('checkout.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('checkout.cancel'),
        ]);

        return redirect($session->url);
    }

    // public function success(Request $request)
    // {
    //     return "Payment successful! Session ID: " . $request->get('session_id');
    // }

    // public function cancel()
    // {
    //     return "Payment cancelled!";
    // }

    public function webhook(Request $request)
    {
        $payload = $request->getContent();
        $event = json_decode($payload);

        if ($event->type === 'checkout.session.completed') {
            $session = $event->data->object;
            // Mark order as paid
        }

        return response()->json(['status' => 'success']);
    }
}
