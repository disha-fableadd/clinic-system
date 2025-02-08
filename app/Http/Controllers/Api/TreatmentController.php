<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Treatment;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Role;

class TreatmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }







    public function index()
    {
        $treatments = Treatment::select('treatments.*', 'user.fullname as doctor_name')
            ->join('user', 'treatments.doctor_id', '=', 'user.id') // Adjust table names if needed
            ->get();

        return response()->json($treatments, 200);
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
        $treatment = Treatment::with('doctor')->findOrFail($id);
        if ($treatment) {
            $treatment->doctor_name = $treatment->doctor ? $treatment->doctor->fullname : 'not user ';
        }
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
