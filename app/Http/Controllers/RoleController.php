<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
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

//     public function show($id)
//     {
      
//         $role = Role::find($id);
    
  
//         if (!$role) {
//             abort(404, 'Role not found');
//         }
    
    
//         return view('role.show', compact('role'));
//     }
//     public function edit($id)
// {
//     $role = Role::findOrFail($id);
//     return view('role.edit', compact('role'));
// }
}
