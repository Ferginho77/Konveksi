<div>
    @extends('layouts.header')

@section('title', 'Dashboard')

@section('content')
<div class="container py-4">

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row g-4">
        <!-- CARD FORM -->
        <div class="col-md-5">
            <div class="card shadow-lg border-0 h-100">
                <div class="card-header bg-primary text-white text-center py-3">
                    <h5 class="mb-0 fw-bold">Input Produk</h5>
                </div>
                <div class="card-body p-4">
                    <form action="" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama Produk</label>
                            <input type="text" name="Namaproduk" class="form-control" placeholder="Masukan nama barang" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Stok</label>
                            <input type="number" name="Stok" class="form-control" placeholder="0" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Tanggal Masuk</label>
                            <input type="date" name="TanggalMasuk" class="form-control" placeholder="0" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Deskripsi Barang</label>
                            <textarea name="Deskripsi" class="form-control" rows="3" placeholder="Keterangan barang..."></textarea>
                        </div>

                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="btn btn-success fw-bold py-2">
                                Simpan ke Database
                            </button>
                            <a href="/produk" class="btn btn-light btn-sm text-muted">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- CARD TABLE -->
        <div class="col-md-7">
            <div class="card shadow-lg border-0 h-100">
                <div class="card-header bg-dark text-white text-center py-3">
                    <h5 class="mb-0 fw-bold">Daftar Produk</h5>
                </div>
                <div class="card-body p-3 table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-secondary text-center">
                            <tr>
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th>Stok</th>
                                <th>Tanggal Masuk</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($produk as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $item->Namaproduk }}</td>
                                    <td class="text-center">{{ $item->Stok }}</td>
                                    <td class="text-center">{{ $item->TanggalMasuk }}</td>
                                    <td>{{ $item->Deskripsi }}</td>
                                    <td>
                                     <button class="btn btn-primary btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#EditStok"
                                        data-id="{{ $item->id }}"
                                        data-nama="{{ $item->Namaproduk }}"
                                        data-stok="{{ $item->Stok }}"
                                    >Edit</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted">
                                        Data barang belum tersedia
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@include('modals.editstok')
@endsection
</div>
