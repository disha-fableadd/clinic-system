<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modules;
class ModuleController extends Controller
{
    

    public function index()
    {
        $modules = Modules::all(); 
        return response()->json($modules);  
    }
    
    
}
