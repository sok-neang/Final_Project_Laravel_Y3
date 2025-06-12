<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('login'); // Return the login view
    }

    public function authenticate(Request $request)
    {
        //user must be input email and password
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        //check user data in database
        //if user data is correct, then login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended();  // Redirect to the intended page after login
        }
        
        //if login not success, then return back to login page with error message
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}