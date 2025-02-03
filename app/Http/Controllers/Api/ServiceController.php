<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    /**
     * Get all services.
     */
    public function index()
    {
        $services = Services::all();
        return response()->json($services, 200);
    }

    /**
     * Store a new service.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:services,name',
            'description' => 'nullable|string',
            'type' => 'required|in:x-ray,blood-test,consultation,surgery,therapy,other',
            'price' => 'required|numeric',
            'status' => 'required|in:active,inactive,discontinued',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $service = Services::create([
            'name' => $request->name,
            'description' => $request->description,
            'type' => $request->type,
            'price' => $request->price,
            'status' => $request->status,
        ]);

        return response()->json([
            'message' => 'Service created successfully',
            'service' => $service
        ], 201);
    }

    /**
     * Get a single service by ID.
     */
    public function show($id)
    {
        $service = Services::findOrFail($id);
        return response()->json($service, 200);
    }

    /**
     * Update an existing service.
     */
    public function update(Request $request, $id)
    {
        $service = Services::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:services,name,' . $service->id,
            'description' => 'nullable|string',
            'type' => 'required|in:x-ray,blood-test,consultation,surgery,therapy,other',
            'price' => 'required|numeric',
            'status' => 'required|in:active,inactive,discontinued',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $service->update([
            'name' => $request->name,
            'description' => $request->description,
            'type' => $request->type,
            'price' => $request->price,
            'status' => $request->status,
        ]);

        return response()->json([
            'message' => 'Service updated successfully',
            'service' => $service
        ], 200);
    }

    /**
     * Delete a service.
     */
    public function destroy($id)
    {
        $service = Services::findOrFail($id);
        $service->delete();

        return response()->json(['message' => 'Service deleted successfully'], 200);
    }
}
