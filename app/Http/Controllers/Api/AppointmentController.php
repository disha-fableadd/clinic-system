<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointments;
use App\Models\Patients;
use App\Models\User;
use App\Models\Treatment;
use Illuminate\Support\Facades\Validator;

class AppointmentController extends Controller
{
    /**
     * Get all appointments.
     */
    public function index()
    {
        $appointments = Appointments::with(['patient', 'doctor', 'treatment'])->get();
        return response()->json($appointments, 200);
    }

    /**
     * Store a new appointment.
     */
    public function store(Request $request)
    {
        // Validation rules
        $validator = Validator::make($request->all(), [
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:user,id',
            'treatment_id' => 'required|exists:treatments,id',
            'appoint_type' => 'required|string',
            'status' => 'required|string',
            'time' => 'required|date',
            'duration' => 'required|integer',
            'clinic_location' => 'required|string',
            'followup_required' => 'required|boolean',
            'followup_update' => 'nullable|date',
        ]);

        // Return errors if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Create new appointment
        $appointment = Appointments::create($request->all());

        return response()->json([
            'message' => 'Appointment created successfully',
            'appointment' => $appointment
        ], 201);
    }

    /**
     * Get a single appointment by ID.
     */
    public function show($id)
    {
        $appointment = Appointments::with(['patient', 'doctor', 'treatment'])->findOrFail($id);
        return response()->json($appointment, 200);
    }

    /**
     * Update an appointment.
     */
    public function update(Request $request, $id)
    {
        $appointment = Appointments::findOrFail($id);

        // Validate input
        $validator = Validator::make($request->all(), [
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:user,id',
            'treatment_id' => 'required|exists:treatments,id',
            'appoint_type' => 'required|string',
            'status' => 'required|string',
            'time' => 'required|date',
            'duration' => 'required|integer',
            'clinic_location' => 'required|string',
            'followup_required' => 'required|boolean',
            'followup_update' => 'nullable|date',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Update the appointment
        $appointment->update($request->all());

        return response()->json([
            'message' => 'Appointment updated successfully',
            'appointment' => $appointment
        ], 200);
    }

    /**
     * Delete an appointment.
     */
    public function destroy($id)
    {
        $appointment = Appointments::findOrFail($id);
        $appointment->delete();

        return response()->json(['message' => 'Appointment deleted successfully'], 200);
    }
}
