<?php

namespace App\Http\Controllers\Admin;

use App\Models\Quote;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Contracts\Support\Renderable;

class QuotesController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->id;
        return view('quotes::quote.quotes', compact('id'));
    }


    public function create()
    {
        return view('quotes::create');
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Request $request)
    {
        $query = Quote::select('quotes.*', 'products.name as productName', 'vendors.organization as vendorName')
            ->leftJoin('products', 'products.id', 'quotes.product_id')
            ->leftJoin('vendors', 'vendors.id', 'products.vendor_id');

        $data = $query->where('quotes.status_id', $request->id)->get();

        return DataTables::of($data)

            ->addColumn('action', '<div class="d-inline-flex"><a class="pr-1 dropdown-toggle hide-arrow text-primary" data-toggle="dropdown"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical font-small-4"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg></a><div class="dropdown-menu dropdown-menu-right"> <a href="javascript:;" class="dropdown-item delete-record" onclick="deleteItem({{$id}})"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 mr-50 font-small-4"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>Delete</a> </div></div>')

            ->addColumn('status', '
            <select onchange="changeStatus({{$id}}, this)"  class="badge badge-glow badge-primary">
            <option {{$status_id==1 ? "selected":""}} value="1"> New </option>
            <option {{$status_id==2 ? "selected":""}} value="2"> Junk </option>
            <option {{$status_id==3 ? "selected":""}} value="3"> Contacted </option>
            </select>')

            ->rawColumns(['action', 'status'])
            ->make(true);
    }

    public function showJunk()
    {
        $query = Quote::select('quotes.*', 'products.name as productName', 'vendors.organization as vendorName')
            ->leftJoin('products', 'products.id', 'quotes.product_id')
            ->leftJoin('vendors', 'vendors.id', 'products.vendor_id');

        $data = $query->where('status_id', 2)->get();

        return DataTables::of($data)

            ->addColumn('action', '<div class="d-inline-flex"><a class="pr-1 dropdown-toggle hide-arrow text-primary" data-toggle="dropdown"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical font-small-4"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg></a><div class="dropdown-menu dropdown-menu-right"> <a href="javascript:;" class="dropdown-item delete-record" onclick="deleteItem({{$id}})"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 mr-50 font-small-4"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>Delete</a> </div></div>')

            ->addColumn('status', '
            <select onchange="changeStatus({{$id}}, this)"  class="badge badge-glow badge-primary">
            <option {{$status_id==1 ? "selected":""}} value="1"> New </option>
            <option {{$status_id==2 ? "selected":""}} value="2"> Junk </option>
            <option {{$status_id==3 ? "selected":""}} value="3"> Contacted </option>
            </select>')

            ->rawColumns(['action', 'status'])
            ->make(true);
    }

    public function showContacted()
    {
        $query = Quote::select('quotes.*', 'products.name as productName', 'vendors.organization as vendorName')
            ->leftJoin('products', 'products.id', 'quotes.product_id')
            ->leftJoin('vendors', 'vendors.id', 'products.vendor_id');

        $data = $query->where('status_id', 3)->get();

        return DataTables::of($data)

            ->addColumn('action', '<div class="d-inline-flex"><a class="pr-1 dropdown-toggle hide-arrow text-primary" data-toggle="dropdown"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical font-small-4"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg></a><div class="dropdown-menu dropdown-menu-right"> <a href="javascript:;" class="dropdown-item delete-record" onclick="deleteItem({{$id}})"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 mr-50 font-small-4"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>Delete</a> </div></div>')

            ->addColumn('status', '
            <select onchange="changeStatus({{$id}}, this)"  class="badge badge-glow badge-primary">
            <option {{$status_id==1 ? "selected":""}} value="1"> New </option>
            <option {{$status_id==2 ? "selected":""}} value="2"> Junk </option>
            <option {{$status_id==3 ? "selected":""}} value="3"> Contacted </option>
            </select>')

            ->rawColumns(['action', 'status'])
            ->make(true);
    }


    public function edit($id)
    {
        return view('quotes::edit');
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Request $request)
    {
        $id = $request->input("id", $request->id);

        if ($id != null) {
            Quote::where("id", $id)->delete();
        }
        return redirect()->back();
    }

    public function changestatus(Request $request)
    {
        $status = Quote::where('id', $request->id)->first();
        $status->status_id = $request->status;
        $status->save();
        return redirect()->back();
    }
}
