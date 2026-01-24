<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use App\Models\Pendapatan;

class PendapatanController extends Controller
{
    public function index(){

        $pendapatan = Pendapatan::all();
        $karyawans = Karyawan::all();

        $pendapatan->map(function ($item) {
        $item->total = $item->JumlahPendapatanAwal + $item->JumlahPendapatanAkhir;
        return $item;
    });
        return view('pendapatan', compact('pendapatan', 'karyawans'));
    }

    public function store(Request $request){
        $request->validate([
            'IdKaryawan' => 'required|exists:karyawans,id',
            'JumlahPendapatanAwal' => 'required|numeric|min:0',
        ]);

        Pendapatan::create([
            'IdKaryawan' => $request->IdKaryawan,
            'JumlahPendapatanAwal' => $request->JumlahPendapatanAwal,
        ]);

        return redirect()->back()->with('success', 'Pendapatan berhasil ditambahkan.');
    }
}
