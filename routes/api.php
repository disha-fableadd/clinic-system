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

Route::post('/login', [AuthController::class, 'login'])->withoutMiddleware('auth:sanctum');
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
Route::middleware('auth:sanctum')->get('/user', [AuthController::class, 'user']);


Route::post('add-user', [UserController::class, 'store']);




Route::get('/user_permissions/{userId}', [UserPermissionController::class, 'getPermissions']);


Route::apiResource('rolee', RoleController::class);

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

Route::apiResource('permissions', UserPermissionController::class);



Route::get('modules', [ModuleController::class, 'index']);


Route::get('/categories', function () {
    return response()->json(Categories::all());
});

