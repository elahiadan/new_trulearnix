<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class VendorsController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->id;

        return view('vendors::vendor.vendors', compact('id'));
    }

    public function create()
    {
        return view('vendors::vendor.add-vendor');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
            'contact' => 'required|min:10',
            'password' => 'required|string|min:8|same:cpassword',
            'cpassword' => 'required|min:8'
        ]);
        $user = new User();

        $data = $request->input();
        $user->name = $data['name'];
        $user->organization = $data['organization'];
        $user->street = $data['street'];
        $user->city = $data['city'];
        $user->state = $data['state'];
        $user->country = $data['country'];
        $user->email = $data['email'];
        $user->contact = $data['contact'];
        $user->establishment_year = $data['establishment_year'];
        $user->business_type = $data['business_type'];
        $user->about = $data['about'];
        $user->is_admin = 2;
        $user->image = 'default.png';
        $user->status_id = 2;
        $user->password = Hash::make($data['password']);
        $user->save();

        return redirect(route('vendors', ['id' => 2]));
    }

    public function show(Request $request)
    {
        $query = User::select('users.*');

        $data = $query->whereNot('users.is_admin', 1)->where('users.status_id', $request->id)->get();

        return Datatables::of($data)
            ->addColumn('view', '<a href="{{route("vendors.view",[ "id" => $id ])}}" class="customButton">+</a>')
            ->addColumn('action', '<div class="d-inline-flex"><a class="pr-1 dropdown-toggle hide-arrow text-primary" data-toggle="dropdown"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical font-small-4"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg></a><div class="dropdown-menu dropdown-menu-right"><a href="{{route("vendors.view",[ "id" => $id ])}}" class="dropdown-item"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text mr-50 font-small-4"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>View</a> <a href="javascript:;" class="dropdown-item delete-record" onclick="deleteItem({{$id}})"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 mr-50 font-small-4"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>Delete</a> </div></div>')

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
        $user = User::find($request->id);

        $data = $request->input();
        $user->name = $data['name'];
        $user->organization = $data['organization'];
        $user->street = $data['street'];
        $user->city = $data['city'];
        $user->state = $data['state'];
        $user->country = $data['country'];
        $user->email = $data['email'];
        $user->contact = $data['contact'];
        $user->establishment_year = $data['establishment_year'];
        $user->business_type = $data['business_type'];
        $user->about = $data['about'];
        $user->is_admin = 2;
        $user->status_id = $data['status'];
        $user->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Request $request)
    {
        $id = $request->input("id", $request->id);

        if ($id != null) {
            User::where("id", $id)->delete();
        }
        return redirect()->back();
    }

    public function view(Request $request, $id)
    {
        $vendor = User::where('is_admin', 2)->where('id', $id)->first();

        return view('vendors::vendor.view-vendor', compact('vendor'));
    }

    public function uploadImage(Request $request)
    {
        $data = User::find($request['userid']);
        if ($request->hasFile('profile-image')) {
            $image = $request->file('profile-image');
            $name = uniqid() . ".jpg";
            $path = public_path('images/vendor/profile');
            $image->move($path, $name);
            $data->image = $name;
            $data->save();
        }
        return redirect()->back();
    }


    public function changestatus(Request $request)
    {
        $status = User::where('id', $request->id)->first();
        $status->status_id = $request->status;
        $status->save();
        return redirect()->back();
    }


    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'

        ]);

        $user = User::find($request->id);
        $data = $request->input();
        $user->password = Hash::make($data['password']);
        $user->save();

        return redirect()->back();
    }
}
