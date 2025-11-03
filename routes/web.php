<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ObatController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome.index');

// ✅ Route export & import harus di atas resource agar tidak bentrok
Route::get('/obat/export', [ObatController::class, 'export'])->name('obat.export');
Route::post('/obat/import', [ObatController::class, 'import'])->name('obat.import');

Route::get('/pelanggan/export', [PelangganController::class, 'export'])->name('pelanggan.export');
Route::post('/pelanggan/import', [PelangganController::class, 'import'])->name('pelanggan.import');

Route::get('/staff/export', [StaffController::class, 'export'])->name('staff.export');
Route::post('/staff/import', [StaffController::class, 'import'])->name('staff.import');

// ✅ Resource route diletakkan di bawah
Route::resource('obat', ObatController::class);
Route::resource('pelanggan', PelangganController::class);
Route::resource('staff', StaffController::class);
