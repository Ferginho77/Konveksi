<?php

namespace App\Http\Controllers;


use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
   public function index(){
    $barang = Barang::all();
       return view('barang', compact('barang'));
   }

   public function store(Request $request) {
        $request->validate([
        'NamaBarang' => 'required',
        'Stok' => 'required|integer',
        'Deskripsi' => 'nullable'
    ]);

Barang::create($request->all());

    // Ini supaya balik lagi ke form dan nampilin pesan sukses poin 3 tadi
    return redirect()->back()->with('success', 'Mantap! Data berhasil disimpan.');
    }

    public function EditBarang(Request $request){
        $request->validate([
        'NamaBarang' =>  'required|string|max:255',
        'Stok' =>  'required|string|max:255',
        'Deskripsi' =>  'required|string|max:255'
        ]);

        $barang = Barang::find($request->id);
        $barang->NamaBarang = $request->NamaBarang;
        $barang->Stok = $request->Stok;
        $barang->Deskripsi = $request->Deskripsi;
        $barang->save();

        return redirect()->route('barang')->with('success', 'barang Berhasil Di Edit');
    }

     public function HapusBarang($id){
        $barang = Barang::find($id);
        $barang->delete();

        return redirect()->route('barang')->with('success', 'Barang Berhasil Di Hapus');
    }
}
