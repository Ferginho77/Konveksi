<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
    
        $karyawan = Karyawan::all();

        return view('manajemen', compact('karyawan'));
    }

    
    public function TambahKaryawan(Request $request){

        $request->validate([
        'NamaKaryawan' =>  'required|string|max:255',
        'Posisi' =>  'required|in:Cutting,Renda,Polet,Obras,Seleting,Packing',
        'Gaji' =>  'required|string|max:255',
        'Status' => 'required|in:Aktif,NonAktif'
        ]);

        Karyawan::create([
        'NamaKaryawan' => $request->NamaKaryawan,
        'Posisi' => $request->Posisi,
        'Gaji' => $request->Gaji,
        'Status' => $request->Status   
        ]);

        return redirect()->route('manajemen')->with('success', 'Karyawan Berhasil Di Tambahkan');
    }

    public function EditKaryawan(Request $request){

        $request->validate([
        'NamaKaryawan' =>  'required|string|max:255',
        'Posisi' =>  'required|in:Cutting,Renda,Polet,Obras,Seleting,Packing',
        'Gaji' =>  'required|string|max:255',
        'Status' => 'required|in:Aktif,NonAktif'
        ]);

        $karyawan = Karyawan::find($request->IdKaryawan);
        $karyawan->NamaKaryawan = $request->NamaKaryawan;
        $karyawan->Posisi = $request->Posisi;
        $karyawan->Gaji = $request->Gaji;
        $karyawan->Status = $request->Status;
        $karyawan->save();

        return redirect()->route('manajemen')->with('success', 'Karyawan Berhasil Di Edit');
    }

    public function HapusKaryawan($id){
        $karyawan = Karyawan::find($id);
        $karyawan->delete();

        return redirect()->route('manajemen')->with('success', 'Karyawan Berhasil Di Hapus');
    }
}
