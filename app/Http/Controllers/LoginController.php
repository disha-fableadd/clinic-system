<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Userr;

class LoginController extends Controller
{
    public function index()
    {
        return view('login'); 
    }

    public function loginSubmit(Request $request)
    {
        
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Attempt login
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Redirect to dashboard on successful login
            return redirect()->route('dashboard');
        }

        // If login fails, redirect back with an error message
        return redirect()->back()->withErrors(['email' => 'Invalid credentials.']);
    }
    
}

