<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Modules\Admin\Entities\Contact;
use Modules\Admin\Entities\Newsletter;
use Modules\Admin\Entities\Recaptcha;
use Modules\Admin\Entities\Seo;
use Modules\Admin\Entities\WebsitePage;
use Modules\Homepage\Entities\Homepage;

class HomeController extends Controller
{
    private $pages;

    public function __construct()
    {
        $this->pages = 'frontend';
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Homepage::with(['homeproducts' => function ($query) {
            $query->with(['product']);
        }])->where('status_id', 1)->get();

        return view('welcome', compact('products'));
    }


    public function about(){
        return view('websites::pages.about');
    }

    public function contact(){
        return view('websites::pages.contact');
    }

    public function newHome(){
        return view('frontend.index');
    }

    public function newAbout(){
        return view('frontend.about');
    }

    public function newContact(){
        return view('frontend.contact');
    }

    public function newGallery(){
        return view('frontend.gallery');
    }

    public function productDetails(){
        return view('frontend.product-details');
    }
}
