<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PollController;
use App\Http\Controllers\AuthController;

// Root: redirect to login
Route::get('/', [AuthController::class, 'showLogin']);

// Login routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Register routes
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Poll routes (protected)
Route::get('/poll', [PollController::class, 'index'])->name('poll.index');
Route::post('/vote', [PollController::class, 'vote'])->name('poll.vote');