<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SessionController;

Route::get('/registration', [AuthController::class, 'registrationForm'])->name('registrationForm');
Route::post('/registration', [AuthController::class, 'registration'])->name('registration');


Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'loginForm'])->name('loginForm');
    Route::post('/Checklogin', [AuthController::class, 'login'])->name('Checklogin');
});

// SUPER ADMIN ONLY
Route::middleware(['RoleAuth:super_admin'])->group(function () {
    Route::resource('branches', BranchController::class);
});

Route::middleware(['RoleAuth:super_admin,admin'])->group(function () {
    Route::get('/dashboard', [AuthController::class, 'viewDashboard'])->name('dashboard');

    Route::prefix('admin')->group(function () {

        Route::resource('register', RegistrationController::class);

        Route::get('/patient/history/{number}', [HistoryController::class, 'index'])->name('admin.patient.history');

        Route::get('/assessment', [AssessmentController::class, 'index'])->name('assessment.index');
        Route::post('/assessment/assign',[AssessmentController::class,'assignStore'])->name('assessment.assign');

        Route::get('/doctor/index', [DoctorController::class, 'index'])->name('doctor.index');
        Route::get('/doctor/create', [DoctorController::class, 'create'])->name('doctor.create');
        Route::post('/doctor/store', [DoctorController::class, 'store'])->name('doctor.store');

        Route::get('/session/index', [SessionController::class, 'index'])->name('treatmentSession.index');
        Route::post('/session/index', [SessionController::class, 'store'])->name('treatmentSession.store');

    });
});

// DOCTOR + SUPER ADMIN
Route::middleware(['RoleAuth:super_admin,doctor,admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('doctor/dashboard', [AuthController::class, 'doctorDashboard'])->name('doctor.dashboard');
        Route::get('/logout', [AuthController::class, 'logout'])->name('Checklogout');

        Route::get('/assessment/show', [AssessmentController::class, 'show'])->name('assessment.show');
        Route::get('/assessment/create/{id}', [AssessmentController::class, 'create'])->name('assessment.create');
        Route::post('/assessment/store/{id}', [AssessmentController::class, 'store'])->name('assessment.store');
    });
});



// Route::middleware(['RoleAuth:super_admin,admin'])->group(function () {
//     Route::get('/dashboard', [AuthController::class, 'viewDashboard'])->name('dashboard');
//     Route::get('/logout', [AuthController::class, 'logout'])->name('Checklogout');

//     Route::resource('branches', BranchController::class);


//     // ADMIN
//     Route::prefix('admin')->group(function () {
//         Route::resource('register', RegistrationController::class);
//         Route::get('/patient/history/{number}', [HistoryController::class, 'index'])->name('admin.patient.history');

//         // ASSESSMENT
//         Route::get('/assessment', [AssessmentController::class, 'index'])->name('assessment.index');
//         Route::get('/assessment/create', [AssessmentController::class, 'create'])->name('assessment.create');

//         // DOCTOR
//         Route::get('/doctor/index', [DoctorController::class, 'index'])->name('doctor.index');
//         Route::get('/doctor/create', [DoctorController::class, 'create'])->name('doctor.create');
//         Route::post('/doctor/store', [DoctorController::class, 'store'])->name('doctor.store');


//     });
// });
