<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\RegistrationController;


Route::get('/registration', [AuthController::class, 'registrationForm'])->name('registrationForm');
Route::post('/registration', [AuthController::class, 'registration'])->name('registration');


Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'loginForm'])->name('loginForm');
    Route::post('/Checklogin', [AuthController::class, 'login'])->name('Checklogin');
});


Route::middleware(['RoleAuth:super_admin,admin'])->group(function () {
    Route::get('/dashboard', [AuthController::class, 'viewDashboard'])->name('dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('Checklogout');

    Route::resource('branches', BranchController::class);


    // ADMIN
    Route::prefix('admin')->group(function () {
        Route::resource('register', RegistrationController::class);
        Route::get('/patient/history/{number}', [HistoryController::class, 'index'])->name('admin.patient.history');

        // ASSESSMENT
        Route::get('/assessment', [AssessmentController::class, 'index'])->name('assessment.index');
        Route::get('/assessment/create', [AssessmentController::class, 'create'])->name('assessment.create');

        // DOCTOR
        Route::get('/doctor/index', [DoctorController::class, 'index'])->name('doctor.index');
        Route::get('/doctor/create', [DoctorController::class, 'create'])->name('doctor.create');
        Route::post('/doctor/store', [DoctorController::class, 'store'])->name('doctor.store');


    });
});
