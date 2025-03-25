<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RekapitulasiController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// dashboard
Route::get('/', function () {
    return redirect()->route('loginuser');
});

// dashboard
// Route::get('/exportrekapitulasi', [RekapitulasiController::class, 'rekapitulasiexport'])->name('exportrekapitulasi');
// Route::get('/dashboard', [RekapitulasiController::class, 'index'])->name('dashboard')->middleware('auth');
// Route::get('/upload', [RekapitulasiController::class, 'upload'])->name('upload');
// Route::post('/importrekapitulasi', [RekapitulasiController::class, 'rekapitulasiimportexcel'])->name('importrekapitulasi');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [RekapitulasiController::class, 'index'])->name('dashboard');
    // Rute-rute lain yang membutuhkan login
    Route::get('/exportrekapitulasi', [RekapitulasiController::class, 'rekapitulasiexport'])->name('exportrekapitulasi');
    Route::get('/upload', [RekapitulasiController::class, 'upload'])->name('upload');
    Route::post('/importrekapitulasi', [RekapitulasiController::class, 'rekapitulasiimportexcel'])->name('importrekapitulasi');
});
// Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('loginuser');
Route::post('/login', [LoginController::class, 'loginProsess'])->name('loginProsess');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::middleware('auth')->group(function () { 
    Route::get('/admin/dashboard', function () {
        return view('Admin.dashboard');
    })->name('Admin.dashboard');
});

// Register
// Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');