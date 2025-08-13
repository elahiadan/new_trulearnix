<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // DASHBOARD VIEW
    public function index()
    {
        return view('admin.dashboard');
    }

    public function blogList()
    {
        $blogs = [];
        return view('admin.blogs',compact('blogs'));
    }

    public function blogCreate()
    {
        return view('admin.blog-create');
    }
}
