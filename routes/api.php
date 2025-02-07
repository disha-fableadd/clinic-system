<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\MedicineController;
use App\Http\Controllers\Api\PatientController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\UserDetailsController;
use App\Http\Controllers\Api\TreatmentController;
use App\Http\Controllers\Api\AppointmentController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\PatientDischargeDetailController;
use App\Http\Controllers\Api\SupplierController;
use App\Http\Controllers\Api\InventoryController;
use App\Http\Controllers\Api\MedicalReportController;
use App\Http\Controllers\Api\UserPermissionController;
use App\Http\Controllers\api\ModuleController;
use App\Models\Categories;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\DashboardController;
use App\Models\User;


Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    // Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/user', [AuthController::class, 'user'])->name('user');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::apiResource('rolee', RoleController::class);
    Route::apiResource('users', UserController::class);

    Route::apiResource('medicines', MedicineController::class);

    Route::apiResource('patient', PatientController::class);

    // Route::apiResource('users', UserController::class);

    Route::apiResource('user-details', UserDetailsController::class);

    Route::apiResource('treatments', TreatmentController::class);
    // Route::get('/doctors', [TreatmentController::class, 'getDoctors']);

    Route::get('/doctors', function () {
        $doctors = User::whereHas('role', function ($query) {
            $query->where('name', 'doctor'); 
        })->select('id', 'fullname')->get();
    
        return response()->json($doctors);
    });


    Route::apiResource('appointments', AppointmentController::class);

    Route::apiResource('services', ServiceController::class);

    Route::apiResource('patient-discharge-details', PatientDischargeDetailController::class);

    Route::apiResource('suppliers', SupplierController::class);
 
    



    Route::apiResource('inventoryy', InventoryController::class);

    Route::apiResource('medical-reports', MedicalReportController::class);

    Route::apiResource('permissions', UserPermissionController::class);



    Route::get('modules', [ModuleController::class, 'index']);


    Route::get('/categories', function () {
        return response()->json(Categories::all());
    });



    Route::get('total-users', [UserController::class, 'getTotalUsers']);
    Route::get('total-doctors', [UserController::class, 'getTotalDoctors']);
    Route::get('total-patient', [UserController::class, 'getTotalPatient']);
    Route::get('total-appointment', [UserController::class, 'getTotalAppointment']);
});
// routes/api.php
Route::middleware('auth:sanctum')->get('/profile', [AuthController::class, 'profile']);

Route::middleware('auth:sanctum')->put('/profile', [AuthController::class, 'updateProfile']);


Route::get('/permissions', [UserPermissionController::class, 'getUserPermissions'])->middleware('auth:sanctum');




// Route::post('add-user', [UserController::class, 'store']);




// Route::get('/user_permissions/{userId}', [UserPermissionController::class, 'getPermissions']);


// Route::apiResource('rolee', RoleController::class);



