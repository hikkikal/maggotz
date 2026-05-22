<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'auth.login');
Route::view('/login', 'auth.login');

Route::view('/dashboard', 'dashboard.index');
Route::view('/monitoring', 'monitoring.index');
Route::view('/edukasi', 'edukasi.index');
Route::view('/laporan', 'laporan.index');

Route::prefix('maggot')->group(function () {

    Route::view('/', 'maggot.index')->name('maggot.index');

    Route::view('/create', 'maggot.create')->name('maggot.create');

    Route::view('/edit', 'maggot.edit')->name('maggot.edit');

});
