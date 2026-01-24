<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\Barang;
use App\Models\Produk;

class DashboardController extends Controller
{
    public function index(){
    $karyawan = Karyawan::count();
    $barang = Barang::count();
    $tampil = Karyawan::all();

    $produk = Produk::select('Stok')->get();


    return view('Dashboard', compact('karyawan', 'barang', 'tampil', 'produk'));

    }
}