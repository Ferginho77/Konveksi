<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Support\Facades\DB;

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

public function EditStok(Request $request)
{
    $produkId = $request->produk_id;
    $stokBaru = (int) $request->stok_baru;

    $aturanBahan = [
        'Kain Tileu' => 6.5,
        'Kawat'      => 2,
        'Seleting'   => 1,
    ];

    try {
        DB::transaction(function () use ($produkId, $stokBaru, $aturanBahan) {
            $produk = DB::table('produk')->find($produkId);

            $stokLama = (int) $produk->Stok;
            $selisih  = $stokBaru - $stokLama;

            // CEK STOK BAHAN (HANYA JIKA STOK NAIK)
            if ($selisih > 0) {
                foreach ($aturanBahan as $nama => $qty) {
                    $stokBahan = DB::table('barang')
                        ->where('NamaBarang', $nama)
                        ->value('Stok');

                    if ($stokBahan < ($qty * $selisih)) {
                        // Melempar Exception agar transaksi di-rollback
                        throw new \Exception("Stok {$nama} tidak mencukupi untuk menambah {$selisih} produk.");
                    }
                }
            }

            // Update Stok Produk
            DB::table('produk')
                ->where('id', $produkId)
                ->update(['Stok' => $stokBaru]);

            // Update Stok Bahan
            foreach ($aturanBahan as $nama => $qty) {
                $jumlah = $qty * abs($selisih);

                if ($selisih > 0) {
                    DB::table('barang')->where('NamaBarang', $nama)->decrement('Stok', $jumlah);
                } elseif ($selisih < 0) {
                    DB::table('barang')->where('NamaBarang', $nama)->increment('Stok', $jumlah);
                }
            }
        });

        return redirect()->route('produk')->with('success', 'Stok produk berhasil diperbarui');

    } catch (\Exception $e) {
        // Jika ada error/exception, kembali ke halaman sebelumnya dengan pesan error
        return back()->with('error', $e->getMessage())->withInput();
    }
}

public function formEditStok($id)
{
    $produk = DB::table('produk')->where('id', $id)->first();

    if (!$produk) {
        abort(404, 'Produk tidak ditemukan');
    }

    return view('edit-stok', compact('produk'));
}

}
