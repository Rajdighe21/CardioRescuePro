<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;


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
        Route::get('/patient/history/{number}',[HistoryController::class,'index'])->name('admin.patient.history');
    });
});
