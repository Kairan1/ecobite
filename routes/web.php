<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\VendorController;

// Landing Page
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Student Module
Route::get('/student/dashboard', [StudentController::class, 'index'])->name('student.dashboard');

// Vendor Module
Route::get('/vendor/dashboard', [VendorController::class, 'index'])->name('vendor.dashboard');