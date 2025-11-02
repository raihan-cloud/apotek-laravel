<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ObatController;
Route::get('/', function () {
    return view('welcome');
    })->name('welcome.index');

Route::resource('pelanggan', PelangganController::class);
Route::resource('staff', StaffController::class);
Route::resource('obat', ObatController::class);

