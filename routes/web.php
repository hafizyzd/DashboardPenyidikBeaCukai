<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('Admin/dashboard');});
Route::get('/login', function () {return view('authentication.login');});
Route::get('/register', function () {return view('authentication.register');});
Route::get('/forgotpassword', function () {return view('authentication.forgotpassword');});