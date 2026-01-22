<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function index(){
    $produk = Produk::all();
       return view('produk', compact('produk'));
   }

   public function TambahProduk(Request $request){
      $request->validate([
        'Namaproduk' => 'required',
        'Stok' => 'required|integer',
        'TanggalMasuk' => 'required|date',
        'Deskripsi' => 'nullable'
    ]);

    Produk::create($request->all());
    return redirect()->back()->with('success', 'Mantap! Data berhasil disimpan.');
   }
}
