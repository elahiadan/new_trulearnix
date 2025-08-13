<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Contracts\Support\Renderable;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.categories');
    }


    public function create()
    {
        return view('admin.category.add-category');
    }


    public function store(Request $request)
    {
        $user = new Category();

        $data = $request->input();
        $user->name = $data['name'];
        $user->status_id = $data['status'];
        $user->save();

        return redirect(route('categories'));
    }


    public function show()
    {
        $query = Category::select('categories.*');

        $data = $query->get();

        return DataTables::of($data)
            ->addColumn('action', '<div class="d-inline-flex"><a class="pr-1 dropdown-toggle hide-arrow text-primary" data-toggle="dropdown"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical font-small-4"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg></a><div class="dropdown-menu dropdown-menu-right"><button onclick="editCategory({{$id}},\'{{$name}}\',{{$status_id}})" class="dropdown-item w-100"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text mr-50 font-small-4"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>Edit</button> <a href="javascript:;" class="dropdown-item delete-record" onclick="deleteItem({{$id}})"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 mr-50 font-small-4"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>Delete</a> </div></div>')

            ->editColumn('status', function ($raw) {

                return '<select onchange="changeStatus(' . $raw->id . ', this)" class="badge badge-glow badge-primary">
                        <option ' . ($raw->status_id == 1 ? "selected" : "") . ' value="1"> Active </option>
                        <option ' . ($raw->status_id == 2 ? "selected" : "") . ' value="2"> InActive </option>
                    </select>';
            })

            ->rawColumns(['action', 'status'])
            ->make(true);
    }


    public function update(Request $request)
    {
        $user = Category::find($request->id);

        $data = $request->input();
        $user->name = $data['name'];
        $user->status_id = $data['status'];
        $user->save();

        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $id = $request->input("id", $request->id);

        if ($id != null) {
            Category::where("id", $id)->delete();
        }
        return redirect()->back();
    }

    public function changestatus(Request $request)
    {
        $status = Category::where('id', $request->id)->first();
        $status->status_id = $request->status;
        $status->save();
        return redirect()->back();
    }
}
