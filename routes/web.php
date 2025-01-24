<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\EmployeeController;
Route::get('/', function () {
    return view('welcome');
});




Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

Route::get('/user', [EmployeeController::class, 'index'])->name('user.index');
Route::get('/user/create', [EmployeeController::class, 'create'])->name('user.create');

Route::get('/doctors', [DoctorController::class, 'index'])->name('doctor.index');
