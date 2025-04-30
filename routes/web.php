<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RekapitulasiController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// dashboard
Route::get('/', function () {return redirect()->route('loginuser');});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [RekapitulasiController::class, 'index'])->name('dashboard');
    Route::get('/exportrekapitulasi', [RekapitulasiController::class, 'rekapitulasiexport'])->name('exportrekapitulasi');
    Route::get('/upload', [RekapitulasiController::class, 'upload'])->name('upload');
    Route::post('/importrekapitulasi', [RekapitulasiController::class, 'rekapitulasiimportexcel'])->name('importrekapitulasi');
    Route::delete('/dashboard/{id}', [RekapitulasiController::class, 'destroy'])->name('rekapitulasi.destroy');
    Route::get('/editData/{id}', [RekapitulasiController::class, 'edit'])->name('rekapitulasi.edit');
    Route::put('/update/{id}', [RekapitulasiController::class, 'update'])->name('rekapitulasi.update');
});



// Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('loginuser');
Route::post('/login', [LoginController::class, 'loginProsess'])->name('loginProsess');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::middleware('auth')->group(function () { Route::get('/admin/dashboard', function () { return view('Admin.dashboard');})->name('Admin.dashboard');});
