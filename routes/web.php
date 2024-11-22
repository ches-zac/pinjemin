<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProfileController;

Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'loginForm'])->name('welcome');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'registerForm'])->name('regisForm');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'goToUserDashboard'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'show'])->name('show.profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('edit.profile');

    // Route untuk admin
    Route::middleware('admin')->group(function () {
        Route::get('/admin/dashboard', [DashboardController::class, 'goToAdminDashboard'])->name('admin.dashboard');
        Route::get('/admin/users', [ProfileController::class, 'manageUsers'])->name('admin.manage.users');
        Route::prefix('/admin/categories')->group(function () {
            Route::get('/', [CategoryController::class, 'show'])->name('admin.categories.index'); // List kategori
            Route::get('/add', [CategoryController::class, 'add'])->name('admin.categories.add'); // Form tambah
            Route::post('/add', [CategoryController::class, 'store'])->name('admin.categories.store'); // Proses tambah
            Route::get('/edit/{category}', [CategoryController::class, 'edit'])->name('admin.categories.edit'); // Form edit
            Route::put('/edit/{category}', [CategoryController::class, 'update'])->name('admin.categories.update'); // Proses edit
            Route::delete('/delete/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.delete'); // Proses hapus
        });
        Route::prefix('/admin/inventory')->group(function () {
            Route::get('/', [InventoryController::class, 'showInventory'])->name('admin.inventory.index'); // List kategori
            Route::get('/add', [InventoryController::class, 'addInventory'])->name('admin.inventory.add'); // Form tambah
            Route::post('/add', [InventoryController::class, 'storeInventory'])->name('admin.inventory.store'); // Proses tambah
            Route::get('/edit/{inventory}', [InventoryController::class, 'editInventory'])->name('admin.inventory.edit'); // Form edit
            Route::put('/edit/{inventory}', [InventoryController::class, 'updateInventory'])->name('admin.inventory.update'); // Proses edit
            Route::delete('/delete/{inventory}', [InventoryController::class, 'destroyInventory'])->name('admin.inventory.delete'); // Proses hapus
        });
    });
});

