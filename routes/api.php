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



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// role
// Route::get('/rolee', [RoleController::class, 'index']);
// Route::post('/rolee', [RoleController::class, 'store']); 
// Route::get('/rolee/{id}', [RoleController::class, 'show']); 
// Route::put('/rolee/{id}', [RoleController::class, 'update']); 
// Route::delete('/rolee/{id}', [RoleController::class, 'destroy']); 
Route::apiResource( 'rolee', RoleController::class);

Route::apiResource('medicines', MedicineController::class);
Route::apiResource('patient', PatientController::class);
Route::apiResource('users', UserController::class);
Route::apiResource('user-details', UserDetailsController::class);
Route::apiResource('treatments', TreatmentController::class);
Route::apiResource('appointments', AppointmentController::class);
Route::apiResource('services', ServiceController::class);
Route::apiResource('patient-discharge-details', PatientDischargeDetailController::class);
Route::apiResource('suppliers', SupplierController::class);
Route::apiResource('inventoryy', InventoryController::class);
Route::apiResource('medical-reports', MedicalReportController::class);
Route::apiResource( 'permissions', UserPermissionController::class);