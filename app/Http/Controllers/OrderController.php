<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\ProductReferral;
use App\Services\ReferralService;
use App\DataTables\UsersDataTable;

class OrderController extends Controller
{

    public function index(Request $request, UsersDataTable $dataTable)
    {
        return $dataTable->render('dashboard');
    }

    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     //
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, ReferralService $referralService)
    {
        $buyer = auth()->user();
        $productId = $request->product_id;

        // Check if this buyer was referred for this product
        $referral = ProductReferral::where('product_id', $productId)
            ->where('referred_user_id', $buyer->id)
            ->where('purchased', false)
            ->first();

        if ($referral) {
            $referral->update(['purchased' => true]);
            $referralService->handleProductPurchase($buyer, $productId);

            // Give reward to referrer
            // $referralService->giveReward($referral->referrer_id, 50, "Earned for referring product {$productId} purchased by {$buyer->name}");

            // Give reward to buyer
            // $referralService->giveReward($buyer->id, 20, "Earned for purchasing a product via referral");
        }
    }

    public function purchase(Request $request, ReferralService $referralService)
    {
        $buyer = auth()->user();
        $productId = $request->product_id;

        // Order creation logic here...

        // Handle referral reward
        $referralService->handleProductPurchase($buyer, $productId);

        return response()->json(['message' => 'Purchase successful']);
    }


    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $this->authorize('view', $order); // optional if using policies
        $order->load('items.product');
        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
