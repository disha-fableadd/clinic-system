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

    public function authenticate(Request $request)
    {
        
        $validated = $request->validate([
            'email' => 'required|email|string',  
            'password' => 'required|string',
        ]);
    
       
        $user = Userr::where('email', $request->email)->first();
    
        
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect()->route('dashboard');
        } else {
            return back()->withErrors(['email' => 'Invalid credentials.']);
        }
    }
    
}

