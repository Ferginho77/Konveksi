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
        $totalpendapatan = 0;

        return view('pendapatan', compact('pendapatan', 'karyawans', 'totalpendapatan'));
    }

   public function filtering(Request $request)
{
    $request->validate([
        'IdKaryawan' => 'required',
        'start_date' => 'nullable|date',
        'end_date' => 'nullable|date',
    ]);

    $query = Pendapatan::with('karyawan')
        ->where('IdKaryawan', $request->IdKaryawan);

    if ($request->filled('start_date') && $request->filled('end_date')) {
        $query->whereBetween('Tanggal', [
            $request->start_date,
            $request->end_date
        ]);
    }

    $pendapatan = $query->orderBy('Tanggal', 'desc')->get();
    $karyawans = Karyawan::all();
    $totalpendapatan = $pendapatan->sum('Jumlah');

    return view('pendapatan', compact(
        'pendapatan',
        'karyawans',
        'totalpendapatan'
    ));
}
}
