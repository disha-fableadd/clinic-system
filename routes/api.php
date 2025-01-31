<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\MedicineController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// role
Route::apiResource('role', RoleController::class);
Route::apiResource('medicines', MedicineController::class);