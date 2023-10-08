<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;


    Route::get('/', [HomeController::class, 'HomeView']);
    Route::get('/post', [PostController::class, 'PostView']);
    Route::get('login', [AuthController::class, 'loginView']);
    Route::post('login', [AuthController::class, 'LoginAdmin'])->name('login');
    Route::get('register', [AuthController::class, 'RegisterView']);
    Route::post('/register', [AuthController::class, 'RegisterAdmin'])->name('register');

// middleware
    Route::get('/dashboard', [DashboardController::class, 'DashboardView'])->name('dash')->middleware('auth');
    // Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
