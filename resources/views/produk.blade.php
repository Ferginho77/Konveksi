@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid py-5 px-4 product-dashboard-fullscreen">

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
        <!-- FORM INPUT PRODUK -->
        <div class="col-md-5">
            <div class="card card-shadow rounded-4 h-100">
                <div class="card-header bg-gradient-primary text-white text-center py-3 rounded-top-4">
                    <h5 class="mb-0 fw-bold">Input Produk</h5>
                </div>
                <div class="card-body p-4">
                    <form action="" method="POST" novalidate>
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-primary">Nama Produk</label>
                            <input type="text" name="Namaproduk" class="form-control form-control-lg rounded-pill shadow-sm" placeholder="Masukan nama produk" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold text-primary">Stok</label>
                            <input type="number" name="Stok" class="form-control form-control-lg rounded-pill shadow-sm" placeholder="0" min="0" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold text-primary">Tanggal Masuk</label>
                            <input type="date" name="TanggalMasuk" class="form-control form-control-lg rounded-pill shadow-sm" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold text-primary">Deskripsi Produk</label>
                            <textarea name="Deskripsi" class="form-control form-control-lg rounded-3 shadow-sm" rows="3" placeholder="Keterangan produk..."></textarea>
                        </div>

                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="btn btn-gradient-success btn-lg fw-bold rounded-pill shadow-hover px-5">
                                Simpan ke Database
                            </button>
                            <a href="/produk" class="btn btn-outline-secondary btn-lg rounded-pill shadow-hover mt-2 text-center">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- TABEL DAFTAR PRODUK -->
        <div class="col-md-7">
            <div class="card card-shadow rounded-4 h-100">
                <div class="card-header bg-gradient-primary text-white text-center py-3 rounded-top-4">
                    <h5 class="mb-0 fw-bold">Daftar Produk</h5>
                </div>
                <div class="card-body p-3 table-responsive">
                    <table class="table align-middle table-hover custom-table w-100">
                        <thead>
                            <tr class="text-center text-primary">
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
                                    <td class="text-center fw-semibold text-primary">{{ $loop->iteration }}</td>
                                    <td>{{ $item->Namaproduk }}</td>
                                    <td class="text-center fw-semibold">{{ $item->Stok }}</td>
                                    <td class="text-center">{{ \Carbon\Carbon::parse($item->TanggalMasuk)->format('d-m-Y') }}</td>
                                    <td>{{ $item->Deskripsi }}</td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-primary shadow-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#EditStok"
                                            data-id="{{ $item->id }}"
                                            data-nama="{{ $item->Namaproduk }}"
                                            data-stok="{{ $item->Stok }}">
                                            Edit
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted fst-italic">
                                        Data produk belum tersedia
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

<style>
    .product-dashboard-fullscreen {
        background-color: #f0f4ff;
        min-height: 90vh;
        max-width: 100vw;
    }


    .card-shadow {
        box-shadow: 0 8px 25px rgb(37 99 235 / 0.15);
        transition: box-shadow 0.3s ease, transform 0.3s ease;
        border: none;
    }

    .card-shadow:hover {
        box-shadow: 0 16px 48px rgb(37 99 235 / 0.3);
        transform: translateY(-8px);
    }


    .rounded-4 {
        border-radius: 1.5rem !important;
    }


    .bg-gradient-primary {
        background: linear-gradient(135deg, #6610f2, #6610f2);
    }

    .bg-gradient-dark {
        background: linear-gradient(135deg, #1e293b, #0f172a);
    }


    .form-control-lg {
        font-size: 1.1rem;
        padding: 0.7rem 1.25rem;
        border-radius: 50px !important;
        border: 1.8px solid #cbd5e1;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 2px 6px rgb(0 0 0 / 0.04);
    }

    .form-control-lg:focus {
        border-color: #6610f2;
        box-shadow: 0 0 12px rgb(37 99 235 / 0.5);
        outline: none;
    }


    .form-label {
        user-select: none;
    }


    .btn-gradient-success {
        background: linear-gradient(135deg, #10b981, #14b8a6);
        color: #fff;
        font-weight: 700;
        box-shadow: 0 8px 20px rgb(16 185 129 / 0.45);
        transition: background 0.3s ease, box-shadow 0.3s ease, transform 0.2s ease;
    }

    .btn-gradient-success:hover,
    .btn-gradient-success:focus {
        background: linear-gradient(135deg, #059669, #0f766e);
        box-shadow: 0 12px 30px rgb(5 150 105 / 0.7);
        transform: translateY(-3px);
        color: #fff;
    }


    .btn-outline-secondary {
        border: 2px solid #cbd5e1;
        color: #64748b;
        font-weight: 600;
        transition: background-color 0.25s ease, color 0.25s ease, border-color 0.25s ease;
    }

    .btn-outline-secondary:hover,
    .btn-outline-secondary:focus {
        background-color: #dbeafe;
        color: #6610f2;
        border-color: #6610f2;
    }


    .custom-table {
        border-collapse: separate;
        border-spacing: 0 1rem;
        font-size: 1rem;
        width: 100%;
    }

    .custom-table thead th {
        border: none;
        padding: 1rem 1.2rem;
        font-weight: 700;
        letter-spacing: 0.07em;
        text-transform: uppercase;
        background: transparent;
    }

    .custom-table tbody tr {
        background: #ffffff;
        box-shadow: 0 6px 12px rgb(0 0 0 / 0.07);
        border-radius: 1rem;
        transition: box-shadow 0.3s ease, transform 0.3s ease;
    }

    .custom-table tbody tr:hover {
        box-shadow: 0 14px 28px rgb(37 99 235 / 0.25);
        transform: translateY(-5px);
        cursor: pointer;
    }

    .custom-table tbody td {
        vertical-align: middle;
        padding: 1rem 1.25rem;
        color: #334155;
        border: none;
    }

    .custom-table tbody td.text-center {
        text-align: center;
    }

    .custom-table tbody td.fw-semibold {
        font-weight: 600;
        color: #6610f2;
    }


    .btn-primary {
        background-color: #6610f2;
        border: none;
        box-shadow: 0 4px 12px rgb(37 99 235 / 0.3);
        transition: background-color 0.3s ease, box-shadow 0.3s ease, transform 0.2s ease;
    }

    .btn-primary:hover,
    .btn-primary:focus {
        background-color: #6610f2;
        box-shadow: 0 8px 24px rgb(30 64 175 / 0.5);
        transform: translateY(-2px);
    }

    @media (max-width: 991.98px) {
        .product-dashboard-fullscreen {
            padding-left: 1rem;
            padding-right: 1rem;
        }
        .custom-table thead th,
        .custom-table tbody td {
            font-size: 0.9rem;
        }
    }
</style>
