<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Controller;


class ForgotPasswordController extends Controller
{

    public function changePassword()
    {
        return view('auth.change-password');
    }

    public function createNewPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'

        ]);

        $updatePassword = User::where('email', Auth::user()->email)->first();

        if (!Hash::check($request['old_password'], Auth::user()->password)) {
            return redirect()->back()->with('error', 'The old password does not match our records.');
        }

        $user = User::where('email', $updatePassword->email)
            ->update(['password' => Hash::make($request->password)]);

        return redirect()->back()->with('success', 'Your password has been changed!');
    }
}
