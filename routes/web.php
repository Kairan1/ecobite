<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\AuthController;

// Home
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Auth Routes
Route::get('/register', [AuthController::class, 'showRegister'])->name('auth.showRegister');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
Route::get('/login', [AuthController::class, 'showLogin'])->name('auth.showLogin');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

// Protected Routes - Require Authentication
Route::middleware('auth')->group(function () {
    // Student
    Route::get('/student/dashboard', [StudentController::class, 'index'])
        ->name('student.dashboard');
    Route::get('/student/profile', [StudentController::class, 'profile'])
        ->name('student.profile');
    Route::post('/student/profile', [StudentController::class, 'updateProfile'])
        ->name('student.updateProfile');
    Route::get('/vendors', [StudentController::class, 'vendors'])
        ->name('student.vendors');
    Route::post('/student/reserve/{id}', [StudentController::class, 'reserve'])->name('student.reserve');

    // Vendor - Must come before /vendor/{id} to match correctly
    Route::get('/vendor/dashboard', [VendorController::class, 'index'])
        ->name('vendor.dashboard');
    Route::get('/vendor/create', [VendorController::class, 'create'])
        ->name('vendor.create');
    Route::post('/vendor/store', [VendorController::class, 'store'])
        ->name('vendor.store');
    Route::delete('/vendor/delete/{id}', [VendorController::class, 'destroy'])
        ->name('vendor.delete');

    // Student - Vendor details must come last
    Route::get('/vendor/{id}', [StudentController::class, 'vendorDetails'])
        ->name('student.vendor-details');
});

// Success page
Route::get('/success', function () {
    return view('success');
})->name('success');