<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('Admin/dashboard');});
// login
Route::get('/login', function () {return view('authentication.login');});
Route::get('/register', function () {return view('authentication.register');});
Route::get('/forgotpassword', function () {return view('authentication.forgotpassword');});

// dashboard
// Route::get('/upload', function () {return view('Admin/upload');});

// for register and login
Route::get('/forgot', function () {return view('authentication.forgotpassword');});
Route::get('/registerlog', function () {return view('authentication.register');});
Route::get('/registolog', function () {return view('authentication.login');});
Route::get('/passtosign', function () {return view('authentication.login');});
Route::get('/passtolog', function () {return view('authentication.login');});