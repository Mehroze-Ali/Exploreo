<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin()
    {
        // Provide logic to dictate which form is active if redirecting back with errors
        // session('active_form') or default 'login' handling in view
        return view('login_signup');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'loginEmail' => ['required', 'email'],
            'loginPassword' => ['required'],
        ]);

        // Map inputs to Auth attempt columns
        if (Auth::attempt(['email' => $credentials['loginEmail'], 'password' => $credentials['loginPassword']])) {
            $request->session()->regenerate();
            return redirect()->route('loading', ['name' => Auth::user()->name]);
        }

        // Flash error and keep login form active
        return back()->withErrors([
            'login_error' => 'Invalid email or password.',
        ])->withInput($request->only('loginEmail'))->with('active_form', 'login');
    }

    public function signup(Request $request)
    {
        // Basic validation and custom regex rules to match legacy
        $request->validate([
            'signupName' => ['required', 'string', 'max:255'],
            'signupEmail' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'signupPassword' => [
                'required', 
                'string', 
                'min:8', 
                'regex:/[A-Z]/',      // 1 Uppercase
                'regex:/[0-9]/',      // 1 Number
                'regex:/[\W_]/'       // 1 Symbol
            ],
            'signupRepeatPassword' => ['required', 'same:signupPassword'],
        ], [
            // Custom error messages to match legacy text
            'signupPassword.regex' => 'Password must be 8+ chars with 1 uppercase, 1 number, and 1 symbol.',
            'signupEmail.unique' => 'This email address is already registered.',
            'signupRepeatPassword.same' => 'Passwords do not match.'
        ]);

        $user = User::create([
            'name' => $request->signupName,
            'email' => $request->signupEmail,
            'password' => Hash::make($request->signupPassword),
        ]);

        Auth::login($user);

        return redirect()->route('loading', ['name' => $user->name]);
    }

    public function loading(Request $request)
    {
        $name = $request->query('name', 'Explorer');
        return view('loading', ['userName' => $name]);
    }
}
