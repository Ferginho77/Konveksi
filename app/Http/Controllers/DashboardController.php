<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\Barang;

class DashboardController extends Controller
{
    public function index(){
    $karyawan = Karyawan::count();
    $barang = Barang::count();
    $tampil = Karyawan::all();


    return view('Dashboard', compact('karyawan', 'barang', 'tampil'));

    }
}