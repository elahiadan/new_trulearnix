<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Contracts\Support\Renderable;

class ProductsController extends Controller
{

    public function index(Request $request)
    {
        $id = $request->id;

        // if (auth()->user()->is_admin != 1  && $id != 1) {
        //     return redirect()->back();
        // }

        return view('admin.product.products', compact('id'));
    }

    public function create()
    {
        $categories = Category::where('status_id', 1)->latest()->get();
        $vendors = User::where('status_id', 1)->latest()->get();
        $brands = Brand::where('status_id', 1)->latest()->get();

        return view('admin.product.add-product', compact('categories', 'vendors', 'brands'));
    }

    public function store(Request $request)
    {
        $user = new Product();

        $data = $request->input();

        $user->name = $data['name'];
        $user->category_id  = $data['category'];
        $user->vendor_id  = $data['vendor'];
        $user->price_range = $data['price'];
        $user->status_id  = $data['status'];
        $user->description = $data['description'];
        $user->brand_id = $data['brand'];

        if ($request->hasFile('profile-image')) {
            $image = $request->file('profile-image');
            $name = uniqid() . ".jpg";
            $path = public_path('images/product');
            $image->move($path, $name);
            $user->image = $name;
        }

        $arr = [];
        foreach ($data['specification'] as $specification) {

            if ($specification['key'] != null) {
                $arr[$specification['key']] = $specification['value'];
            } else {
                $arr = null;
            }
        }

        $user->specification = $arr;
        $user->save();

        return redirect(route('products', ['id' => 1]));
    }


    public function show(Request $request)
    {
        $query = Product::select('products.*', 'users.organization as vendorName')
            ->leftJoin('users', 'users.id', 'products.vendor_id');

        // if (auth()->user()->is_admin != 1) {
        //     $query->where('vendor_id', auth()->user()->id);
        // }

        $data = $query->where('products.status_id', $request->id)->get();

        return DataTables::of($data)

            ->addColumn('view', '<a href="{{route("products.view",[ "id" => $id ])}}" class="customButton">+</a>')

            ->addColumn('action', '<div class="d-inline-flex"><a class="pr-1 dropdown-toggle hide-arrow text-primary" data-toggle="dropdown"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical font-small-4"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg></a><div class="dropdown-menu dropdown-menu-right"><a href="{{route("products.view",[ "id" => $id ])}}" class="dropdown-item"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text mr-50 font-small-4"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>View</a> <a href="javascript:;" class="dropdown-item delete-record" onclick="deleteItem({{$id}})"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 mr-50 font-small-4"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>Delete</a> </div></div>')

            ->editColumn('status', function ($raw) {
                return '<select onchange="changeStatus(' . $raw->id . ', this)" class="badge badge-glow badge-primary">
                <option ' . ($raw->status_id == 1 ? "selected" : "") . ' value="1"> Active </option>
                <option ' . ($raw->status_id == 2 ? "selected" : "") . ' value="2"> InActive </option>
            </select>';
            })

            ->rawColumns(['view', 'action', 'status'])
            ->make(true);
    }

    public function update(Request $request)
    {
        $user = Product::find($request->id);

        $data = $request->input();

        $user->name = $data['name'];
        $user->category_id  = $data['category'];
        $user->vendor_id  = $data['vendor'];
        $user->price_range = $data['price'];
        $user->status_id  = $data['status'];
        $user->description = $data['description'];
        $user->brand_id = $data['brand'];

        $arr = [];
        foreach ($data['specification'] as $specification) {

            if ($specification['key'] != null) {
                $arr[$specification['key']] = $specification['value'];
            } else {
                $arr = '{}';
            }
        }

        $user->specification = $arr;

        $user->save();

        return redirect()->back();
    }


    public function destroy(Request $request)
    {
        $id = $request->input("id", $request->id);

        if ($id != null) {
            Product::where("id", $id)->delete();
        }
        return redirect()->back();
    }

    public function view(Request $request, $id)
    {
        $product = Product::with(['users', 'statuses', 'categories', 'brands'])->where('id', $id)->first();
        $categories = Category::where('status_id', 1)->latest()->get();
        $vendors = User::where('status_id', 1)->latest()->get();
        $brands = Brand::where('status_id', 1)->latest()->get();

        return view('admin.product.view-product', compact('product', 'categories', 'vendors', 'brands'));
    }

    public function uploadImage(Request $request)
    {
        $data = Product::find($request['userid']);
        if ($request->hasFile('profile-image')) {
            $image = $request->file('profile-image');
            $name = uniqid() . ".jpg";
            $path = public_path('images/product');
            $image->move($path, $name);
            $data->image = $name;
            $data->save();
        }
        return redirect()->back();
    }

    public function changestatus(Request $request)
    {
        $status = Product::where('id', $request->id)->first();
        $status->status_id = $request->status;
        $status->save();
        return redirect()->back();
    }
}
