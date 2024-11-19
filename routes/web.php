<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

// Auth routes (dari file auth.php)
require __DIR__.'/auth.php';

// Protected Routes
Route::middleware(['auth', 'verified'])->group(function () {
    // Admin Routes
    Volt::route('admin/dashboard', 'pages.admin.dashboard')
        ->middleware('role:admin')
        ->name('admin.dashboard');

    // User Routes
    Volt::route('dashboard', 'pages.user.dashboard')
        ->middleware('role:user')
        ->name('dashboard');
});
