<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Medicine;
class MedicineController extends Controller
{
    public function index()
    {
        $medicines = Medicine::all()->map(function ($medicine) {
            
            $medicine->image = asset('storage/' . $medicine->image);
            $medicine->category_name = $medicine->category ? $medicine->category->name : 'No category';
         
            return $medicine;
          
        });
        
        return response()->json($medicines, 200);
    }
    


    public function show($id)
    {
       
        $medicine = Medicine::with('category')->find($id);
    
        if ($medicine) {
            $medicine->category_name = $medicine->category ? $medicine->category->name : 'No Category'; // If no category, set 'No Category'
       
            return response()->json($medicine);
        }
    
        return response()->json(['message' => 'Medicine not found'], 404);
    }
    

    public function store(Request $request)
    {
        try {
            // Validate the incoming request
            $request->validate([
                'category_id' => 'required|exists:categories,id', 
                'name' => 'required|string|max:255',
                'description'=>'required|string|max:255',
                'unit' => 'required|string',
                'status' => 'required|in:active,inactive',
                'quantity' => 'required|integer',
                'manufacture_date' => 'required|date',
                'expiry_date' => 'required|date',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,avif|max:2048',  // Update validation
            ]);
    
            // Handle image upload
            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('medicines', 'public');
            }
    
            // Create new medicine entry
            $medicine = Medicine::create([
                'category_id' => $request->category_id,
                'name' => $request->name,
                'description'=>$request->description,
                'unit' => $request->unit,
                'status' => $request->status,
                'quantity' => $request->quantity,
                'manufacture_date' => $request->manufacture_date,
                'expiry_date' => $request->expiry_date,
                'image' => $imagePath,  // Store image path
            ]);
    
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
    
        // Validate the request
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'unit' => 'required|string',
            'status' => 'required|in:active,inactive',
            'description'=>'required|string|max:255',
            'quantity' => 'required|integer',
            'manufacture_date' => 'required|date',
            'expiry_date' => 'required|date|after:manufacture_date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,avif|max:2048',  
        ]);
    
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('medicines', 'public');
            $medicine->image = $imagePath;
        }
    
       
        $medicine->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'unit' => $request->unit,
            'status' => $request->status,
            'description'=>$request->description,
            'quantity' => $request->quantity,
            'manufacture_date' => $request->manufacture_date,
            'expiry_date' => $request->expiry_date,
            'image' => $medicine->image, 
        ]);
    
        return response()->json($medicine, 200);
    }
    
   
    public function destroy($id)
    {
        $medicine = Medicine::findOrFail($id);
        $medicine->delete();

        return response()->json(['message' => 'Medicine deleted successfully'], 200);
    }
}
