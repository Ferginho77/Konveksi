<?php


use App\Http\Controllers\KaryawanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

// LOGIN Route
Route::get('/login', function () {
    return view('Login');
});

//MANAJEMEN ROUTE
Route::get('/manajemen', [KaryawanController::class, 'index'])->name('manajemen');

//KARYAWAN ROUTE
Route::post('/karyawan-tambah', [KaryawanController::class, 'TambahKaryawan'])->name('karyawan.tambah');
Route::delete('/karyawan-hapus/{id}', [KaryawanController::class, 'HapusKaryawan'])->name('karyawan.destroy');
Route::post('/karyawan/edit', [KaryawanController::class, 'EditKaryawan'])->name('karyawan.edit');