<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

// Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'loginForm']);
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'registerForm'])->name('regisForm');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // User Routes
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard')->middleware('role:user');

    // Admin Routes
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard')->middleware('role:admin');
});

