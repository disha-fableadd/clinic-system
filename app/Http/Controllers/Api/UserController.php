<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\UserPermission;
use App\Models\UserDetails;
use Illuminate\Support\Facades\Log;


class UserController extends Controller
{
    /**
     * Get All Users
     */
    public function index()
    {
        $users = User::all()->map(function ($user) {

            $user->profile = asset('storage/' . $user->profile);

            $user->roleName = $user->role ? $user->role->name : 'N/A';

            return $user;


        });
        ;

        return response()->json($users);
    }

    /**
     * Store a new user
     */

    public function store(Request $request)
    {
        // Validate User Input
        $userValidator = Validator::make($request->all(), [
            'role_id' => 'required|int|max:255',
            'username' => 'required|string|max:255|unique:user,username',
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|unique:user,email',
            'phone' => 'nullable|string|max:15',
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048', // validate the image type and size
            'password' => 'required|string|min:6',
        ]);

        if ($userValidator->fails()) {
            return response()->json(['errors' => $userValidator->errors()], 422);
        }

        // Handle Image Upload
        $imagePath = null;
        if ($request->hasFile('profile')) {
            $image = $request->file('profile');
            // Store the image in the 'users' folder under 'public' disk
            $imagePath = $image->store('users', 'public');
        }

        // Create User
        $user = User::create([
            'role_id' => $request->role_id,
            'username' => $request->username,
            'fullname' => $request->fullname,
            'email' => $request->email,
            'phone' => $request->phone,
            'profile' => $imagePath, // Save the image path in the 'profile' column
            'password' => bcrypt($request->password),
        ]);



        // Validate and Create User Details
        $detailsValidator = Validator::make($request->all(), [
            'address' => 'required|string|max:500',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'gender' => 'required|in:Male,Female,Other',
            'birth_date' => 'required|date',
            'shift' => 'nullable|string|max:50',
            'salary' => 'nullable|numeric|min:0',
        ]);

        if ($detailsValidator->fails()) {
            return response()->json(['errors' => $detailsValidator->errors()], 422);
        }

        // Create User Details
        $details = UserDetails::create([
            'user_id' => $user->id,
            'address' => $request->address,
            'state' => $request->state,
            'city' => $request->city,
            'gender' => $request->gender,
            'birth_date' => $request->birth_date,
            'shift' => $request->shift,
            'salary' => $request->salary,
        ]);

        // Decode the permissions JSON
        $permissions = json_decode($request->permissions, true);

        // Validate the permissions data
        $permissionsValidator = Validator::make(['permissions' => $permissions], [
            'permissions' => 'required|array',
            'permissions.*.module_id' => 'required|exists:modules,id',
            'permissions.*.create' => 'nullable|boolean',
            'permissions.*.view' => 'nullable|boolean',
            'permissions.*.update' => 'nullable|boolean',
            'permissions.*.delete' => 'nullable|boolean',
        ]);

        if ($permissionsValidator->fails()) {
            return response()->json(['errors' => $permissionsValidator->errors()], 422);
        }


        foreach ($permissions as $permission) {

            if (!empty($permission['create']) || !empty($permission['view']) || !empty($permission['update']) || !empty($permission['delete'])) {
                UserPermission::create([
                    'user_id' => $user->id,
                    'module_id' => $permission['module_id'],
                    'create' => $permission['create'] ?? false,
                    'view' => $permission['view'] ?? false,
                    'update' => $permission['update'] ?? false,
                    'delete' => $permission['delete'] ?? false,
                ]);
            }
        }

        return response()->json([
            'message' => 'User, Details and Permissions created successfully',
            'user' => $user,
            'details' => $details,
        ], 201);
    }




































    public function show($id)
    {
        // Fetch user with details
        $user = User::with('details')->find($id);

        if ($user) {
            // Add role and other details to the user
            $user->roleName = $user->role ? $user->role->name : 'N/A';
            $user->address = $user->details ? $user->details->address : 'N/A';
            $user->city = $user->details ? $user->details->city : 'N/A';
            $user->state = $user->details ? $user->details->state : 'N/A';
            $user->gender = $user->details ? $user->details->gender : 'N/A';
            $user->birth_date = $user->details ? $user->details->birth_date : 'N/A';
            $user->shift = $user->details ? $user->details->shift : 'N/A';
            $user->salary = $user->details ? $user->details->salary : 'N/A';

            // Fetch user permissions
            $permissions = UserPermission::where('user_id', $id)
                ->get();

            // Add permissions to the user response
            $user->permissions = $permissions;
            Log::info($user);
            return response()->json($user);
        }

        return response()->json(['message' => 'User not found'], 404);
    }





    /**
     * Update a user
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Validate Input
        $validator = Validator::make($request->all(), [
            'role_id' => 'required|int|max:255',
            'username' => 'required|string|max:255|unique:user,username,' . $id,
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|unique:user,email,' . $id,
            'phone' => 'nullable|string|max:15',
            'profile' => 'nullable|string',
            'password' => 'nullable|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Update Password if Provided
        if ($request->has('password')) {
            $request->merge(['password' => Hash::make($request->password)]);
        }

        // Update User
        $user->update($request->all());

        return response()->json([
            'message' => 'User updated successfully',
            'user' => $user
        ]);
    }

    /**
     * Delete a user
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'User deleted successfully']);
    }
}
