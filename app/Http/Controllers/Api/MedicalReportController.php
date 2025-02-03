<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\MedicalReport;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;

class MedicalReportController extends Controller
{
    public function index()
    {
        try {
            $reports = MedicalReport::all();
            return response()->json($reports, 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'Something went wrong!'], 500);
        }
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'patient_id' => 'required|exists:patients,id',
                'doctor_id' => 'required|exists:user,id',
                'service_id' => 'required|exists:services,id',
                'description' => 'required|string',
                'file_path' => 'required|file|mimes:pdf,jpg,png,doc,docx|max:2048',
            ]);

            if ($request->hasFile('file_path')) {
                $file = $request->file('file_path');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('uploads/reports', $fileName, 'public');

                $requestData = $request->all();
                $requestData['file_path'] = $filePath; // Store only the file path
            }

            $report = MedicalReport::create($requestData);
            return response()->json($report, 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        }
    }

    public function show($id)
    {
        try {
            $medicalReport = MedicalReport::findOrFail($id);
            return response()->json($medicalReport, 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Medical report not found'], 404);
        } catch (Exception $e) {
            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }
    public function update(Request $request, $id)
    {
        try {
            // Validate incoming request data
            $validatedData = $request->validate([
                'patient_id' => 'required|exists:patients,id',
                'doctor_id' => 'required|exists:user,id',
                'service_id' => 'required|exists:services,id',
                'description' => 'required|string',
            ]);
    
            // Find the medical report by ID
            $medicalReport = MedicalReport::findOrFail($id);
    
            // Update the report with validated data
            $medicalReport->update($validatedData);
    
            return response()->json(['message' => 'Medical report updated successfully', 'data' => $medicalReport], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Medical report not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
        }
    }
    
    



    public function destroy($id)
    {
        try {
            $medicalReport = MedicalReport::findOrFail($id);
            $medicalReport->delete();
            return response()->json(null, 204);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Medical report not found'], 404);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to delete medical report'], 500);
        }
    }
}
