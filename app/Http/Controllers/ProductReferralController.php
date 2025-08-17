<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductReferral;
use Yajra\DataTables\Facades\DataTables;

class ProductReferralController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.referral.referrals');
    }

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductReferral $productReferral)
    {
        $query = ProductReferral::select('product_referrals.*');

        $data = $query->get();

        return DataTables::of($data)

            ->editColumn('status', function ($raw) {

                if ($raw->purchased) {
                    return "Used";
                }
                return "Not used";
            })

            ->rawColumns(['status'])
            ->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductReferral $productReferral)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductReferral $productReferral)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductReferral $productReferral)
    {
        //
    }
}
