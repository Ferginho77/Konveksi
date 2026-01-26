<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Pendapatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormController extends Controller
{
    public function index()
{
    $karyawans = Karyawan::all();
    $pendapatan = collect(); // KOSONG
    $totalpendapatan = 0;
    return view('formkaryawan', compact('karyawans', 'pendapatan', 'totalpendapatan'));
}


    public function TambahPendapatan(Request $request){

    $request->validate([
    'IdKaryawan' => 'required',
    'Jumlah' => 'required|numeric|min:0',
    'Tanggal' => 'nullable|date',
]);

      
    Pendapatan::create([
        'IdKaryawan' => $request->IdKaryawan,
        'Jumlah' => $request->Jumlah,
        'Tanggal' => now()->toDateString(),
    ]);

    return redirect()->back()->with('success', 'Pendapatan berhasil ditambahkan.');
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

    return view('formkaryawan', compact(
        'pendapatan',
        'karyawans',
        'totalpendapatan'
    ));
}


}