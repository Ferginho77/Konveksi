<?php


use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// LOGIN Route
Route::get('/login', function () {
    return view('Login');
});

//MANAJEMEN ROUTE
Route::get('/manajemen', [KaryawanController::class, 'index'])->name('manajemen');

//KARYAWAN ROUTE
Route::post('/karyawan-tambah', [KaryawanController::class, 'TambahKaryawan'])->name('karyawan.tambah');
Route::delete('/karyawan-destroy/{id}', [KaryawanController::class, 'HapusKaryawan'])->name('karyawan.destroy');
Route::post('/karyawan/edit', [KaryawanController::class, 'EditKaryawan'])->name('karyawan.edit');
