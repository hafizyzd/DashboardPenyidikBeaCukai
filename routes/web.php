<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RekapitulasiController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// dashboard
Route::get('/', function () {return view('auth/login');});

// dashboard
Route::get('/exportrekapitulasi', [RekapitulasiController::class, 'rekapitulasiexport'])->name('exportrekapitulasi');
// Route::get('/', [RekapitulasiController::class, 'dashboard'])->name('dashboard');
Route::get('/dashboard', [RekapitulasiController::class, 'index'])->name('dashboard');

// import excel 
Route::get('/upload', [RekapitulasiController::class, 'upload'])->name('upload');
Route::post('/importrekapitulasi', [RekapitulasiController::class, 'rekapitulasiimportexcel'])->name('importrekapitulasi');

// Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('loginuser');
Route::post('/login', [LoginController::class, 'login'])->name('loginuser.post');

// Register
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);