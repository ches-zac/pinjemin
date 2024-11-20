<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;

// Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'loginForm']);
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'registerForm'])->name('regisForm');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    //Route untuk user umum
    Route::middleware('role:user')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'goToUserDashboard'])->name('dashboard');
        Route::get('/profile', [ProfileController::class, 'show'])->name('show.profile');
        Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('edit.profile');
    });

    // Route untuk admin
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/dashboard', [DashboardController::class, 'goToAdminDashboard'])->name('admin.dashboard');
        Route::get('/admin/users', [ProfileController::class, 'manageUsers'])->name('admin.manage.users');
    });
});

