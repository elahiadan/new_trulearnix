<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    // LOGIN VIEW
    public function index()
    {
        return view('auth.login');
    }


    // LOGIN USER
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $status = User::where('email', $request->email)->first();
        // if ($status != null && $status->status_id == 1) {
            $r = false;
            if ($request->input("remember") != null) {
                $r = true;
            }
            if (Auth::attempt($credentials, $r)) {
                $request->session()->regenerate();
                return redirect()->intended('admin/dashboard');
            }
        // }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }


    //  LOGOUT METHOD
    public function logout()
    {
        auth()->logout();

        return redirect()->route('login');
    }
}
