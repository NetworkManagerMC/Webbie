<?php

use Illuminate\Support\Facades\Route;

Route::middleware('pre-install')->group(function () {
    Route::view('/install', 'install')->name('install');
});

Route::middleware('post-install')->group(function () {
    Route::redirect('/', '/dashboard');

    Route::middleware('guest')->group(function () {
        Route::view('/login', 'auth.login')->name('login');
    });

    Route::middleware('auth')->group(function () {
        Route::view('/dashboard', 'dashboard.index')->name('dashboard.index');
    });
});
