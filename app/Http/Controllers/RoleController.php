<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        
    
        return view('role.index', );
    }
    
    
    public function create()
    {
        return view('role.create');
    }

  
}
