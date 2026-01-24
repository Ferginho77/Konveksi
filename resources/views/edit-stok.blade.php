<div>
   <div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header">
            <h5 class="mb-0">Edit Stok Produk</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('produk.editStok') }}" method="POST">
                @csrf

                {{-- ID PRODUK --}}
                <input type="text" name="produk_id" value="{{ $produk->id }}">

                {{-- NAMA PRODUK --}}
                <div class="mb-3">
                    <label class="form-label">Nama Produk</label>
                    <input type="text" class="form-control" value="{{ $produk->Namaproduk }}" readonly>
                </div>

                {{-- STOK LAMA --}}
                <div class="mb-3">
                    <label class="form-label">Stok Saat Ini</label>
                    <input type="number" class="form-control" value="{{ $produk->Stok }}" readonly>
                </div>

                {{-- STOK BARU --}}
                <div class="mb-3">
                    <label class="form-label">Stok Baru</label>
                    <input type="number" name="stok_baru" class="form-control" required min="0">
                </div>

                <button type="submit" class="btn btn-primary">
                    Simpan Perubahan
                </button>
                <a href="{{ url()->previous() }}" class="btn btn-secondary">
                    Kembali
                </a>
            </form>
        </div>
    </div>
</div>
</div>
