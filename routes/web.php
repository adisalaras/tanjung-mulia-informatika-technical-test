<?php

use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Models\NewPasswordController;
use App\Models\PasswordResetLinkController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('layouts.app');
// });

Route::get('/', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login.store');

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    Route::get('/register', [AuthenticatedSessionController::class, 'register'])->name('auth.register');
    
    Route::post('/register/store', [AuthenticatedSessionController::class, 'storeRegister'])->name('register.store');

    // route::resource('user', UserController::class);
    // route::resource('dashboard', DashboardController::class);
    Route::middleware(['auth'])->group(function () {
        Route::resource('user', UserController::class);
        Route::resource('dashboard', DashboardController::class);
    });

