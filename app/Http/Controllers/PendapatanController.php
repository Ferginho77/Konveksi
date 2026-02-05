<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use App\Models\Pendapatan;

class PendapatanController extends Controller
{
    public function index(){

        $pendapatan = Pendapatan::with('karyawan')
                        ->orderBy('created_at', 'desc')
                        ->paginate(10);
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

    $gaji = Karyawan::where('IdKaryawan', $request->IdKaryawan)->value('Gaji');
    $hasil = $totalpendapatan * $gaji;
    

    return view('pendapatan', compact(
        'pendapatan',
        'karyawans',
        'totalpendapatan',
        'hasil'
    ));
}

public function Sortir(Request $request)
{
    $request->validate([
        'start_date' => 'nullable|date',
        'end_date'   => 'nullable|date',
    ]);

    $query = Pendapatan::with('karyawan');

    if ($request->filled('start_date') && $request->filled('end_date')) {
        $query->whereBetween('Tanggal', [
            $request->start_date . ' 00:00:00',
            $request->end_date . ' 23:59:59'
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