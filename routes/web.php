<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LendingController;
use App\Http\Controllers\UserController;

Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'loginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::get('/register', [AuthController::class, 'registerForm'])->name('regisForm');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'goToUserDashboard'])->name('dashboard');
    Route::prefix('/profile')->group(function () {
        Route::get('/', [ProfileController::class, 'show'])->name('show.profile');
        Route::get('/edit', [ProfileController::class, 'edit'])->name('edit.profile');
        Route::put('/edit', [ProfileController::class, 'update'])->name('update.profile'); // Proses edit
    });
    Route::get('inventory/categories', [CategoryController::class, 'show'])->name('item.categories'); // List kategori
    Route::get('/inventory/{id}/check', [InventoryController::class, 'checkAvailability'])->name('inventory.check');
    Route::prefix('/lending')->group(function () {
        Route::get('/lend', [LendingController::class, 'lendform'])->name('lending.form');
        Route::post('/lend', [LendingController::class, 'lend'])->name('lending');
        Route::get('/ongoing', [LendingController::class, 'myOnGoingLend'])->name('lending.ongoing');
        Route::post('/{id}/return', [LendingController::class, 'return'])->name('lending.return');
    });
    Route::get('/faq', [DashboardController::class, 'faq'])->name('faq');



    // Route untuk admin
    Route::prefix('/admin')->middleware('admin')->group(function () {
        Route::prefix('/users')->group(function () {
            Route::get('/show', [UserController::class, 'show'])->name('show.users');
        });
        Route::get('/dashboard', [DashboardController::class, 'goToAdminDashboard'])->name('admin.dashboard');
        Route::prefix('/categories')->group(function () {
            Route::get('/', [CategoryController::class, 'show'])->name('admin.categories.index'); // List kategori
            Route::get('/add', [CategoryController::class, 'add'])->name('admin.categories.add'); // Form tambah
            Route::post('/add', [CategoryController::class, 'store'])->name('admin.categories.store'); // Proses tambah
            Route::get('/edit/{category}', [CategoryController::class, 'edit'])->name('admin.categories.edit'); // Form edit
            Route::put('/edit/{category}', [CategoryController::class, 'update'])->name('admin.categories.update'); // Proses edit
            Route::delete('/delete/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.delete'); // Proses hapus
        });
        Route::prefix('/inventory')->group(function () {
            Route::get('/', [InventoryController::class, 'showInventory'])->name('admin.inventory.index'); // List inventory
            Route::get('/add', [InventoryController::class, 'addInventory'])->name('admin.inventory.add'); // Form tambah
            Route::post('/add', [InventoryController::class, 'storeInventory'])->name('admin.inventory.store'); // Proses tambah
            Route::get('/edit/{inventory}', [InventoryController::class, 'editInventory'])->name('admin.inventory.edit'); // Form edit
            Route::put('/edit/{inventory}', [InventoryController::class, 'updateInventory'])->name('admin.inventory.update'); // Proses edit
            Route::delete('/delete/{inventory}', [InventoryController::class, 'destroyInventory'])->name('admin.inventory.delete'); // Proses hapus
        });
        Route::prefix('/lending')->group(function () {
            Route::get('/', [LendingController::class, 'show'])->name('admin.lending.history');
            Route::put('/edit/status', [LendingController::class, 'update'])->name('admin.lending.status.edit');
            Route::delete('/delete/{lending}', [LendingController::class, 'destroy'])->name('admin.lending.delete'); // Proses hapus
            Route::get('/download-to-pdf', [LendingController::class, 'exportToPDF'])->name('admin.lending.download.pdf'); // Proses hapus
            Route::get('/download-to-excel', [LendingController::class, 'exportToExcel'])->name('admin.lending.download.excel'); // Proses hapus
        });
    });
});

