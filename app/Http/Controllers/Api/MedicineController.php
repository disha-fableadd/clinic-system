<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Medicine;
class MedicineController extends Controller
{
    public function index()
    {
        $medicines = Medicine::all();
        return response()->json($medicines, 200);
    }


    public function show($id)
    {
        $medicine = Medicine::findOrFail($id);
        return response()->json($medicine, 200);
    }


    public function store(Request $request)
    {
        try {
            // Validate the incoming request
            $request->validate([
                'category_id' => 'required|exists:categories,id', 
                'name' => 'required|string|max:255',
                'unit' => 'required|string',
                'status' => 'required|in:active,inactive',
                'quantity' => 'required|integer',
                'manufacture_date' => 'required|date',
                'expiry_date' => 'required|date|after:manufacture_date',
                'image' => 'nullable|url', 
            ]);

          
            $medicine = Medicine::create($request->all());

           
            return response()->json($medicine, 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
          
            return response()->json([
                'errors' => $e->errors()
            ], 422); 
        } catch (\Exception $e) {
           
            return response()->json([
                'message' => 'An error occurred. Please try again.',
                'error' => $e->getMessage(),
            ], 500); 
        }
    }


    // Update a medicine
    public function update(Request $request, $id)
    {
        $medicine = Medicine::findOrFail($id);

        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'unit' => 'required|string',
            'status' => 'required|in:active,inactive',
            'quantity' => 'required|integer',
            'manufacture_date' => 'required|date',
            'expiry_date' => 'required|date|after:manufacture_date',
            'image' => 'nullable|url',
        ]);

        $medicine->update($request->all());
        return response()->json($medicine, 200);
    }

    // Delete a medicine
    public function destroy($id)
    {
        $medicine = Medicine::findOrFail($id);
        $medicine->delete();
        return response()->json(null, 204);
    }
}
