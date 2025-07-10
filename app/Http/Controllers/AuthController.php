<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

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

    public function showRegisterForm()
        {
            return view('register');
        }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'profile' => 'nullable|image|max:2048',
            
        ]);

        $profilePath = null;

        if ($request->hasFile('profile')) {
            $file = $request->file('profile');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $profilePath = $file->storeAs('uploads/profiles', $fileName, 'public');
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'profile' => $profilePath, 
        ]);

        return redirect()->route('login')->with('success', 'Account created. Please log in.');
    }

}