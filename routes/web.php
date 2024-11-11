<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware('auth')->group(function(){
    Route::get('/', function(){
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware('guest')->group(function(){
    Route::controller(AuthController::class)->group(function(){
        Route::name('auth.')->group(function(){
            Route::get('/login', 'login')->name('login');
            Route::get('/register', 'register')->name('register');
        });
    });
});
Route::get('/login', function () {
    return view('login');
});
