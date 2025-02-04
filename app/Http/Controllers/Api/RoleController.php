<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
class RoleController extends Controller
{
    // Get all roles
    public function index()
    {
        return response()->json(Role::all(), 200);
    }

    // Create a new role
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:role,name',
            'description' => 'required|string',
        ]);

        $role = Role::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return response()->json($role, 201);
    }

    // Get a single role by ID
    // public function show($id)
    // {
    //     $role = Role::findOrFail($id);
    //     return response()->json($role, 200);
    // }
    public function show($id)
    {
        $role = Role::find($id);
        if (!$role) {
            return response()->json(['message' => 'Role not found'], 404);
        }
        return response()->json($role);
        // return view('role.show', compact('role'));
    }
    // Update a role
    public function update(Request $request, $id)
    {
        try {
            $role = Role::findOrFail($id);

            // Validate the request
            $request->validate([
                'name' => 'required|string|unique:role,name,' . $role->id,
                'description' => 'required|string',
            ]);

            // If validation passes, update the role
            $role->update([
                'name' => $request->name,
                'description' => $request->description,
            ]);

            return response()->json($role, 200);

        } catch (ValidationException $e) {
            // Return a custom error response in JSON
            return response()->json([
                'errors' => $e->errors(), // Get the validation errors
            ], 422);
        }
    }

    // Delete a role
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return response()->json(['message' => 'Role deleted successfully'], 200);
    }
}

