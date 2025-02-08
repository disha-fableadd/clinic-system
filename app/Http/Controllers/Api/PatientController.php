<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patients;
use Illuminate\Support\Facades\Validator;

class PatientController extends Controller
{
    /**
     * Get All Patients
     */
    public function index()
    {
        $patients = Patients::all();
        return response()->json($patients);
    }


    /**
     * Store a new patient
     */
    public function store(Request $request)
    {
        // Validate Input
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|unique:patients,email',
            'phone' => 'nullable|string|max:15',
            'address' => 'required|string|max:500',
            'age' => 'required|integer|min:0|max:120',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'profile' => 'nullable|string',
            'blood_group' => 'nullable|string|max:5',
          
            'medical_history' => 'nullable|string',
            'status' => 'nullable|in:active,inactive',
            'treatment_id' => 'nullable|integer|exists:treatments,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Create Patient
        $patient = Patients::create($request->all());

        return response()->json([
            'message' => 'Patient created successfully',
            'patient' => $patient
        ], 201);
    }

    /**
     * Show a single patient
     */
    public function show($id)
    {
        $patient = Patients::find($id);

        if (!$patient) {
            return response()->json(['message' => 'Patient not found'], 404);
        }

        return response()->json($patient);
    }

    /**
     * Update a patient
     */
    public function update(Request $request, $id)
    {
        $patient = Patients::find($id);

        if (!$patient) {
            return response()->json(['message' => 'Patient not found'], 404);
        }

        // Validate Input
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|unique:patients,email,' . $id,
            'phone' => 'nullable|string|max:15',
            'address' => 'required|string|max:500',
            'age' => 'required|integer|min:0|max:120',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'profile' => 'nullable|string',
            'blood_group' => 'nullable|string|max:5',
           
            'medical_history' => 'nullable|string',
            'status' => 'nullable|in:active,inactive',
            'treatment_id' => 'nullable|integer|exists:treatments,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Update Patient
        $patient->update($request->all());

        return response()->json([
            'message' => 'Patient updated successfully',
            'patient' => $patient
        ]);
    }

    /**
     * Delete a patient
     */
    public function destroy($id)
    {
        $patient = Patients::find($id);

        if (!$patient) {
            return response()->json(['message' => 'Patient not found'], 404);
        }

        $patient->delete();

        return response()->json(['message' => 'Patient deleted successfully']);
    }
}
