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
// Route::get('/login', [LoginController::class, 'index'])->name('login');
// Route::post('login', [LoginController::class, 'loginSubmit'])->name('login.submit');


Route::get('/login', [LoginController::class, 'index'])->name('login');

// profile

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

// user
Route::get('/user', [EmployeeController::class, 'index'])->name('user.index');
Route::get('/user/create', [EmployeeController::class, 'create'])->name('user.create');

Route::get('/user/show/{id}', function ($id) {
    return view('user.show', ['user_id' => $id]);
})->name('user.show');

Route::get('/user/edit/{id}', function ($id) {
    return view('user.edit', ['user_id' => $id]);
})->name('user.edit');

Route::get('/user/profile/{id}', function ($id) {
    return view('user.profile', ['user_id' => $id]);
})->name('user.profile');





// role
// Route::resource('role', RoleController::class);
Route::get('/role', [RoleController::class, 'index'])->name('role.index');
Route::get('/role/create', [RoleController::class, 'create'])->name('role.create');

Route::get('/role/show/{id}', function ($id) {
    return view('role.show', ['role_id' => $id]);
})->name('role.show');
Route::get('/role/edit/{id}', function ($id) {
    return view('role.edit', ['role_id' => $id]);
})->name('role.edit');







// discharge
Route::get('/discharge', [DischargeController::class, 'index'])->name('discharge.index');
Route::get('/discharge/create', [DischargeController::class, 'create'])->name('discharge.create');
//patirents
Route::get('/patients', [PatientController::class, 'index'])->name('patients.index');
Route::get('/patients/create', [PatientController::class, 'create'])->name('patients.create');
Route::get('/patients/show/{id}', function ($id) {
    return view('patients.show', ['patients_id' => $id]);
})->name('patients.show');

Route::get('/patients/edit/{id}', function ($id) {
    return view('patients.edit', ['patient_id' => $id]);
})->name('patients.edit');




//medicine
Route::get('/medicine', [MedicineController::class, 'index'])->name('medicine.index');
Route::get('/medicine/create', [MedicineController::class, 'create'])->name('medicine.create');

Route::get('/medicine/show/{id}', function ($id) {
    return view('medicine.show', ['medicine_id' => $id]);
})->name('medicine.show');

Route::get('/medicine/edit/{id}', function ($id) {
    return view('medicine.edit', ['medicine_id' => $id]);
})->name('medicine.edit');


//appointment
Route::get('/appointment', [AppointmentController::class, 'index'])->name('appointment.index');
Route::get('/appointment/create', [AppointmentController::class, 'create'])->name('appointment.create');
//treatment

Route::get('/treatment', [TreatmentController::class, 'index'])->name('treatment.index');
Route::get('/treatment/create', [TreatmentController::class, 'create'])->name('treatment.create');
Route::get('/treatment/show/{id}', function ($id) {
    return view('treatment.show', ['treatment_id' => $id]);
})->name('treatment.show');

Route::get('/treatment/edit/{id}', function ($id) {
    return view('treatment.edit', ['treatment_id' => $id]);
})->name('treatment.edit');


//services
Route::get('/service', [ServiceController::class, 'index'])->name('service.index');
Route::get('/service/create', [ServiceController::class, 'create'])->name('service.create');

Route::get('/service/show/{id}', function ($id) {
    return view('service.show', ['service_id' => $id]);
})->name('service.show');

Route::get('/service/edit/{id}', function ($id) {
    return view('service.edit', ['service_id' => $id]);
})->name('service.edit');
//inventory
Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory.index');
Route::get('/inventory/create', [InventoryController::class, 'create'])->name('inventory.create');
//suplier
Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier.index');
Route::get('/supplier/create', [SupplierController::class, 'create'])->name('supplier.create');

Route::get('/supplier/show/{id}', function ($id) {
    return view('supplier.show', ['supplier_id' => $id]);
})->name('supplier.show');

Route::get('/supplier/edit/{id}', function ($id) {
    return view('supplier.edit', ['supplier_id' => $id]);
})->name('supplier.edit');




//report
Route::get('/report', [MedicalReportController::class, 'index'])->name('report.index');
Route::get('/report/create', [MedicalReportController::class, 'create'])->name('report.create');
//calender
Route::get('/calender', [CalenderController::class, 'index'])->name('calender.index');
//chart
Route::get('/chart', [ChartController::class, 'index'])->name('chart');


