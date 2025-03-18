<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RekapitulasiController;

// dashboard
Route::get('/', function () {return view('Admin/dashboard');});
Route::get('/dashboard', [RekapitulasiController::class, 'index'])->name('dashboard');
// login
Route::get('/login', function () {return view('authentication.login');});
Route::get('/register', function () {return view('authentication.register');});
Route::get('/forgotpassword', function () {return view('authentication.forgotpassword');});

// dashboard
// Route untuk menampilkan data rekapitulasi
Route::get('/', [RekapitulasiController::class, 'index'])->name('dashboard');
Route::get('/exportrekapitulasi', [RekapitulasiController::class, 'rekapitulasiexport'])->name('exportrekapitulasi');

// import excel 
Route::get('/upload', [RekapitulasiController::class, 'upload'])->name('upload');
Route::post('/importrekapitulasi', [RekapitulasiController::class, 'rekapitulasiimportexcel'])->name('importrekapitulasi');


// for register and login
Route::get('/forgot', function () {return view('authentication.forgotpassword');});
Route::get('/registerlog', function () {return view('authentication.register');});
Route::get('/registolog', function () {return view('authentication.login');});
Route::get('/passtosign', function () {return view('authentication.login');});
Route::get('/passtolog', function () {return view('authentication.login');});


//dashboard count view
Route::get('/dashboard', [RekapitulasiController::class, 'calculateloss'])->name('dashboard');