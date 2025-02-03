<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Treatment;
use Illuminate\Support\Facades\Validator;

class TreatmentController extends Controller
{
    /**
     * Get all treatments.
     */
    public function index()
    {
        return response()->json(Treatment::all(), 200);
    }

    /**
     * Store a new treatment.
     */
    public function store(Request $request)
    {
        // Validate input
        $validator = Validator::make($request->all(), [
            'doctor_id' => 'required|exists:user,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Return errors if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Create a new treatment
        $treatment = Treatment::create($request->all());

        return response()->json([
            'message' => 'Treatment created successfully',
            'treatment' => $treatment
        ], 201);
    }

    /**
     * Get a single treatment.
     */
    public function show($id)
    {
        $treatment = Treatment::findOrFail($id);
        return response()->json($treatment, 200);
    }

    /**
     * Update a treatment.
     */
    public function update(Request $request, $id)
    {
        $treatment = Treatment::findOrFail($id);

        // Validate input
        $validator = Validator::make($request->all(), [
            'doctor_id' => 'required|exists:user,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Update treatment details
        $treatment->update($request->all());

        return response()->json([
            'message' => 'Treatment updated successfully',
            'treatment' => $treatment
        ], 200);
    }

    /**
     * Delete a treatment.
     */
    public function destroy($id)
    {
        $treatment = Treatment::findOrFail($id);
        $treatment->delete();

        return response()->json(['message' => 'Treatment deleted successfully'], 200);
    }
}
