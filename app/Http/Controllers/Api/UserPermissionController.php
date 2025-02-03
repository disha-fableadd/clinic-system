<?php

namespace App\Http\Controllers\Api;

use App\Models\UserPermission;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;

class UserPermissionController extends Controller
{
    /**
     * Get all permissions
     */
    public function index(): JsonResponse
    {
        try {
            $permissions = UserPermission::with(['user', 'module'])->get();
            return response()->json($permissions);
        } catch (Exception $e) {
            return response()->json(['error' => 'Something went wrong', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Get a specific permission
     */
    public function show($id): JsonResponse
    {
        try {
            $permission = UserPermission::with(['user', 'module'])->findOrFail($id);
            return response()->json($permission);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Permission not found'], 404);
        } catch (Exception $e) {
            return response()->json(['error' => 'Something went wrong', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Create a new permission
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $validated = $request->validate([
                'user_id' => 'required|exists:user,id',
                'module_id' => 'required|exists:modules,id',
                'create' => 'boolean',
                'view' => 'boolean',
                'update' => 'boolean',
                'delete' => 'boolean',
            ]);

            $permission = UserPermission::create($validated);

            return response()->json(['message' => 'Permission created', 'data' => $permission], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => 'Validation failed', 'messages' => $e->errors()], 422);
        } catch (Exception $e) {
            return response()->json(['error' => 'Something went wrong', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Update an existing permission
     */
    public function update(Request $request, $id): JsonResponse
    {
        try {
            $permission = UserPermission::findOrFail($id);

            $validated = $request->validate([
                'user_id' => 'sometimes|exists:user,id',
                'module_id' => 'sometimes|exists:modules,id',
                'create' => 'boolean',
                'view' => 'boolean',
                'update' => 'boolean',
                'delete' => 'boolean',
            ]);

            $permission->update($validated);

            return response()->json(['message' => 'Permission updated', 'data' => $permission]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Permission not found'], 404);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => 'Validation failed', 'messages' => $e->errors()], 422);
        } catch (Exception $e) {
            return response()->json(['error' => 'Something went wrong', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Delete a permission
     */
    public function destroy($id): JsonResponse
    {
        try {
            $permission = UserPermission::findOrFail($id);
            $permission->delete();
            return response()->json(['message' => 'Permission deleted']);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Permission not found'], 404);
        } catch (Exception $e) {
            return response()->json(['error' => 'Something went wrong', 'message' => $e->getMessage()], 500);
        }
    }
}
