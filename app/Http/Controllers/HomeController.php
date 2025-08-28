<?php

namespace App\Http\Controllers;

use App\Models\Homepage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Homepage::with(['homeproducts' => function ($query) {
            $query->with(['product']);
        }])->where('status', 1)->get();

        return view('welcome', compact('products'));
    }

    public function dashboard()
    {
        $products = [];
        return view('user.dashboard', compact('products'));
    }

    public function productDetails()
    {
        $products = [];
        return view('product-details', compact('products'));
    }

    public function products()
    {
        $products = [];
        return view('products', compact('products'));
    }

    public function cart()
    {
        $products = [];
        return view('cart', compact('products'));
    }

    public function checkout()
    {
        $products = [];
        return view('checkout', compact('products'));
    }

    public function login()
    {
        $products = [];
        return view('login', compact('products'));
    }

    public function about()
    {
        $products = [];
        return view('about', compact('products'));
    }

    public function contact()
    {
        $products = [];
        return view('contact', compact('products'));
    }

    public function faqs()
    {
        $products = [];
        return view('faqs', compact('products'));
    }
}
