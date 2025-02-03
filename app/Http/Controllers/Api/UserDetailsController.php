<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserDetails;
use Illuminate\Support\Facades\Validator;

class UserDetailsController extends Controller
{
    /**
     * Get All User Details
     */
    public function index()
    {
        $details = UserDetails::with('user')->get(); // Eager loading user
        return response()->json($details);
    }

    /**
     * Store new user details
     */
    public function store(Request $request)
    {
        // Validate Input
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:user,id',
            'address' => 'required|string|max:500',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'gender' => 'required|in:male,female,other',
            'birth_date' => 'required|date',
            'education' => 'nullable|string|max:255',
            'experience' => 'nullable|string|max:255',
            'shift' => 'nullable|string|max:50',
            'salary' => 'nullable|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Create User Details
        $details = UserDetails::create($request->all());

        return response()->json([
            'message' => 'User details created successfully',
            'details' => $details
        ], 201);
    }

    /**
     * Show specific user details
     */
    public function show($id)
    {
        $details = UserDetails::with('user')->find($id);

        if (!$details) {
            return response()->json(['message' => 'User details not found'], 404);
        }

        return response()->json($details);
    }

    /**
     * Update user details
     */
    public function update(Request $request, $id)
    {
        $details = UserDetails::find($id);

        if (!$details) {
            return response()->json(['message' => 'User details not found'], 404);
        }

        // Validate Input
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:user,id',
            'address' => 'required|string|max:500',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'gender' => 'required|in:male,female,other',
            'birth_date' => 'required|date',
            'education' => 'nullable|string|max:255',
            'experience' => 'nullable|string|max:255',
            'shift' => 'nullable|string|max:50',
            'salary' => 'nullable|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Update User Details
        $details->update($request->all());

        return response()->json([
            'message' => 'User details updated successfully',
            'details' => $details
        ]);
    }

    /**
     * Delete user details
     */
    public function destroy($id)
    {
        $details = UserDetails::find($id);

        if (!$details) {
            return response()->json(['message' => 'User details not found'], 404);
        }

        $details->delete();

        return response()->json(['message' => 'User details deleted successfully']);
    }
}
