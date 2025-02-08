<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\UserPermission;
use Validator;
use Illuminate\Support\Facades\Log;
class AuthController extends Controller
{


    // public function login(Request $request)
    // {
    //     if (Auth::check()) {
    //         return response()->json(['message' => 'User is already logged in'], 200);
    //     }

    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);

    //     $user = User::where('email', $request->email)->first();

    //     if (!$user || !Hash::check($request->password, $user->password)) {
    //         return response()->json(['message' => 'Invalid credentials'], 401);
    //     }

    //     // Create the token
    //     $token = $user->createToken('auth_token')->plainTextToken;

    //     return response()->json([
    //         'access_token' => $token,
    //         'token_type' => 'Bearer',
    //         'user' => [
    //             'id' => $user->id,
    //             'email' => $user->email,
    //             'role' => $user->role->name,
    //         ],
    //     ]);

    // }\



    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('authToken')->plainTextToken;

        // Fetch User Permissions
        $permissions = UserPermission::where('user_id', $user->id)
            ->pluck('module_id', 'view', 'create', 'update', 'delete')
            ->toArray();

        return response()->json([
            'access_token' => $token,
            'user' => [
                'id' => $user->id,
                'role' => $user->role,
                'permissions' => $permissions,
            ],
        ]);
    }



    public function logout(Request $request)
    {
        $user = $request->user();

        if ($user && $request->bearerToken()) {
            // If using API Token Authentication (Bearer Token)
            $user->tokens()->delete();
        } elseif (Auth::check()) {
            // If using session-based authentication
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        return response()->json(['message' => 'Logged out successfully'], 200);
    }


    public function user(Request $request)
    {
        return response()->json($request->user());
    }




    public function profile(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Eager load the 'role' and 'details' relationships
        $user = Auth::user()->load('role', 'details');

        return response()->json([
            'user' => $user,
            'userId' => $user->id,
            'userDetails' => $user->details,
            'role' => $user->role,
        ]);
    }

    public function updateProfile(Request $request)
    {
        // Validate incoming data
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'fullname' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:15',
            'gender' => 'nullable|string',
            'birth_date' => 'nullable|date',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'profile' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        // Get the authenticated user
        $user = $request->user();

        // Update profile data
        if ($request->hasFile('profile')) {
            // Handle the profile image upload
            $imagePath = $request->file('profile')->store('profile_images', 'public');
            $validated['profile'] = $imagePath;
        }

        $user->update($validated);

        return response()->json(['message' => 'Profile updated successfully']);
    }



}
