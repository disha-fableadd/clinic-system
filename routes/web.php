<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorScheduleController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\CalenderController;
use App\Http\Controllers\ChartController;
Route::get('/', function () {
    return view('welcome');
});




Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

Route::get('/user', [EmployeeController::class, 'index'])->name('user.index');
Route::get('/user/create', [EmployeeController::class, 'create'])->name('user.create');



Route::get('/patients', [PatientController::class, 'index'])->name('patients.index');
Route::get('/patients/create', [PatientController::class, 'create'])->name('patients.create');

Route::get('/appointment', [AppointmentController::class, 'index'])->name('appointment.index');
Route::get('/appointment/create', [AppointmentController::class, 'create'])->name('appointment.create');

Route::get('/schedule', [DoctorScheduleController::class, 'index'])->name('schedule.index');
Route::get('/schedule/create', [DoctorScheduleController::class, 'create'])->name('schedule.create');

Route::get('/department', [DepartmentController::class, 'index'])->name('department.index');
Route::get('/department/create', [DepartmentController::class, 'create'])->name('department.create');

Route::get('/calender', [CalenderController::class, 'index'])->name('calender.index');

Route::get('/chart', [ChartController::class, 'index'])->name('chart');

Route::get('/doctors', [DoctorController::class, 'index'])->name('doctor.index');
