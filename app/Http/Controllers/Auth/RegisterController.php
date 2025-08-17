<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Services\JoiningReferralService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{

    // REGISTER VIEW
    public function index()
    {
        return view('auth.register');
    }


    // REGISTER NEW USER
    public function register(Request $request, JoiningReferralService $joiningReferral)
    {
        request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password'))
        ]);

        // $user->assignRole('user');
        Auth::login($user);

        $joiningReferral->handleReferral($user, $request->referral_code);

        return redirect()->route('dashboard');
    }
}
