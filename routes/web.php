<?php


use App\Http\Controllers\BarangController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PendapatanController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

// LOGIN Route
// Route::get('/login', function () {
//     return view('Login');
// });
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

//DASHBOARD ROUTE
Route::get('/dashboard', [DashboardController::class, 'index'])->name('Dashboard');

Route::post('/', [LoginController::class, 'login'])->name('login');

//MANAJEMEN ROUTE
Route::get('/manajemen', [KaryawanController::class, 'index'])->name('manajemen');

//KARYAWAN ROUTE
Route::post('/karyawan-tambah', [KaryawanController::class, 'TambahKaryawan'])->name('karyawan.tambah');
Route::delete('/karyawan-hapus/{id}', [KaryawanController::class, 'HapusKaryawan'])->name('karyawan.destroy');
Route::post('/karyawan/edit', [KaryawanController::class, 'EditKaryawan'])->name('karyawan.edit');

//BARANG ROUTE
Route::get('/barang', [BarangController::class, 'index'])->name('barang');
Route::post('barang', [BarangController::class, 'store'])->name('barang.tambah');
Route::post('/barang/edit', [BarangController::class, 'EditBarang'])->name('barang.edit');

//Produk Route
Route::get('/produk', [ProdukController::class, 'index'])->name('produk');
Route::post('produk', [ProdukController::class, 'TambahProduk'])->name('produk.tambah');
Route::delete('/barang-hapus/{id}', [BarangController::class, 'HapusBarang'])->name('barang.destroy');

//Pendapatan Route
Route::get('/pendapatan', [PendapatanController::class, 'index'])->name('pendapatan');
