<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PatientDischargeDets;
use Illuminate\Support\Facades\Validator;

class PatientDischargeDetailController extends Controller
{
    /**
     * Get all patient discharge details.
     */
    public function index()
    {
        $dischargeDetails = PatientDischargeDets::all();
        return response()->json($dischargeDetails, 200);
    }

    /**
     * Store a new patient discharge detail.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:user,id',
            'treatment_id' => 'required|exists:treatments,id',
            'room_number' => 'nullable|string',
            'bed_number' => 'nullable|string',
            'admintting_diagnos' => 'nullable|string',
            'discharge_diagnos' => 'nullable|string',
            'total_bill' => 'required|numeric',
            'insurance_coverage' => 'required|numeric',
            'amount_paid' => 'required|numeric',
            'payment_status' => 'required|in:paid,unpaid',
            'discharge_note' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $dischargeDetail = PatientDischargeDets::create([
            'patient_id' => $request->patient_id,
            'doctor_id' => $request->doctor_id,
            'treatment_id' => $request->treatment_id,
            'room_number' => $request->room_number,
            'bed_number' => $request->bed_number,
            'admintting_diagnos' => $request->admintting_diagnos,
            'discharge_diagnos' => $request->discharge_diagnos,
            'total_bill' => $request->total_bill,
            'insurance_coverage' => $request->insurance_coverage,
            'amount_paid' => $request->amount_paid,
            'payment_status' => $request->payment_status,
            'discharge_note' => $request->discharge_note,
        ]);

        return response()->json([
            'message' => 'Patient discharge details created successfully',
            'patient_discharge_detail' => $dischargeDetail
        ], 201);
    }

    /**
     * Get a single patient discharge detail by ID.
     */
    public function show($id)
    {
        $dischargeDetail = PatientDischargeDets::findOrFail($id);
        return response()->json($dischargeDetail, 200);
    }

    /**
     * Update an existing patient discharge detail.
     */
    public function update(Request $request, $id)
    {
        $dischargeDetail = PatientDischargeDets::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:user,id',
            'treatment_id' => 'required|exists:treatments,id',
            'room_number' => 'nullable|string',
            'bed_number' => 'nullable|string',
            'admintting_diagnos' => 'nullable|string',
            'discharge_diagnos' => 'nullable|string',
            'total_bill' => 'required|numeric',
            'insurance_coverage' => 'required|numeric',
            'amount_paid' => 'required|numeric',
            'payment_status' => 'required|in:paid,unpaid',
            'discharge_note' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $dischargeDetail->update([
            'patient_id' => $request->patient_id,
            'doctor_id' => $request->doctor_id,
            'treatment_id' => $request->treatment_id,
            'room_number' => $request->room_number,
            'bed_number' => $request->bed_number,
            'admintting_diagnos' => $request->admintting_diagnos,
            'discharge_diagnos' => $request->discharge_diagnos,
            'total_bill' => $request->total_bill,
            'insurance_coverage' => $request->insurance_coverage,
            'amount_paid' => $request->amount_paid,
            'payment_status' => $request->payment_status,
            'discharge_note' => $request->discharge_note,
        ]);

        return response()->json([
            'message' => 'Patient discharge details updated successfully',
            'patient_discharge_detail' => $dischargeDetail
        ], 200);
    }

    /**
     * Delete a patient discharge detail.
     */
    public function destroy($id)
    {
        $dischargeDetail = PatientDischargeDets::findOrFail($id);
        $dischargeDetail->delete();

        return response()->json(['message' => 'Patient discharge detail deleted successfully'], 200);
    }
}
