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

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');

    Route::get('/register', [AuthenticatedSessionController::class, 'register'])->name('auth.register');

    
    Route::post('/register/store', [AuthenticatedSessionController::class, 'storeRegister'])->name('register.store');

    route::resource('user', UserController::class);
    route::resource('dashboard', DashboardController::class);


