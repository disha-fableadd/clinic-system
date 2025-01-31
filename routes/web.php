<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DischargeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\TreatmentController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CalenderController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\MedicalReportController;

Route::get('/', function () {
    return view('welcome');
});

// dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'loginSubmit'])->name('login.submit');

// profile

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

// user
Route::get('/user', [EmployeeController::class, 'index'])->name('user.index');
Route::get('/user/create', [EmployeeController::class, 'create'])->name('user.create');

Route::resource('role', RoleController::class);

Route::get('/discharge', [DischargeController::class, 'index'])->name('discharge.index');
Route::get('/discharge/create', [DischargeController::class, 'create'])->name('discharge.create');

Route::get('/patients', [PatientController::class, 'index'])->name('patients.index');
Route::get('/patients/create', [PatientController::class, 'create'])->name('patients.create');

Route::get('/medicine', [MedicineController::class, 'index'])->name('medicine.index');
Route::get('/medicine/create', [MedicineController::class, 'create'])->name('medicine.create');

Route::get('/appointment', [AppointmentController::class, 'index'])->name('appointment.index');
Route::get('/appointment/create', [AppointmentController::class, 'create'])->name('appointment.create');


Route::get('/treatment', [TreatmentController::class, 'index'])->name('treatment.index');
Route::get('/treatment/create', [TreatmentController::class, 'create'])->name('treatment.create');

Route::get('/service', [ServiceController::class, 'index'])->name('service.index');
Route::get('/service/create', [ServiceController::class, 'create'])->name( 'service.create');

Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory.index');
Route::get('/inventory/create', [InventoryController::class, 'create'])->name( 'inventory.create');

Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier.index');
Route::get('/supplier/create', [SupplierController::class, 'create'])->name( 'supplier.create');

Route::get('/report', [MedicalReportController::class, 'index'])->name('report.index');
Route::get('/report/create', [MedicalReportController::class, 'create'])->name( 'report.create');

Route::get('/calender', [CalenderController::class, 'index'])->name('calender.index');

Route::get('/chart', [ChartController::class, 'index'])->name('chart');


