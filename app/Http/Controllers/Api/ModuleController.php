<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modules;
class ModuleController extends Controller
{
    public function getModules()
    {
        $modules = Modules::all(); // Assuming you have a Module model
        return response()->json($modules);
    }
    
}
