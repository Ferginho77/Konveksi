@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid py-5 px-4 dashboard-fullscreen">

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- FORM INPUT BARANG -->
    <div class="card card-shadow rounded-4 mb-5 w-100">
        <div class="card-header bg-gradient-primary text-white text-center py-4 rounded-top-4">
            <h4 class="mb-0 fw-bold">Input Barang</h4>
        </div>
        <div class="card-body p-4">
            <form action="{{ route('barang.tambah') }}" method="POST" class="row g-3 align-items-end">
                @csrf
                <div class="col-md-5">
                    <label class="form-label fw-semibold text-primary">Nama Barang</label>
                    <input type="text" name="NamaBarang" class="form-control form-control-lg rounded-pill shadow-sm" placeholder="Masukan nama barang" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold text-primary">Stok</label>
                    <input type="number" name="Stok" class="form-control form-control-lg rounded-pill shadow-sm" placeholder="0" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold text-primary">Deskripsi Barang</label>
                    <input type="text" name="Deskripsi" class="form-control form-control-lg rounded-pill shadow-sm" placeholder="Keterangan barang...">
                </div>

                <div class="col-12 text-end">
                    <a href="/barang" class="btn btn-outline-secondary btn-lg rounded-pill shadow-hover text-muted px-4 me-3">
                        Batal
                    </a>
                    <button type="submit" class="btn btn-gradient-success btn-lg fw-bold rounded-pill shadow-hover px-5">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- TABEL DAFTAR BARANG -->
    <div class="card card-shadow rounded-4 w-100">
        <div class="card-header bg-gradient-primary text-white text-center py-4 rounded-top-4">
            <h4 class="mb-0 fw-bold">Daftar Barang</h4>
        </div>
        <div class="card-body p-3 table-responsive">
            <table class="table align-middle table-hover custom-table w-100">
                <thead>
                    <tr class="text-center text-primary">
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Stok</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($barang as $item)
                        <tr>
                            <td class="text-center fw-semibold text-primary">{{ $loop->iteration }}</td>
                            <td>{{ $item->NamaBarang }}</td>
                            <td class="text-center fw-semibold">{{ $item->Stok }}</td>
                            <td>{{ $item->Deskripsi }}</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-primary shadow-sm"
                                    data-bs-toggle="modal"
                                    data-bs-target="#Editbarang"
                                    data-id="{{ $item->id }}"
                                    data-namabarang="{{ $item->NamaBarang }}"
                                    data-stok="{{ $item->Stok }}"
                                    data-deskripsi="{{ $item->Deskripsi }}">
                                    Edit
                                </button>
                                <form action="{{ route('barang.destroy', $item->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus barang ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger shadow-sm ms-2">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted fst-italic">
                                Data barang belum tersedia
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@include('modals.editbarang')
</div>
@endsection

<style>
    .dashboard-fullscreen {
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
        border-color: #2563eb;
        box-shadow: 0 0 12px rgb(37 99 235 / 0.5);
        outline: none;
    }


    .form-label {
        user-select: none;
    }


    .btn-gradient-success {
        background: linear-gradient(135deg, #14b8a6, #14b8a6);
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
        color: #2563eb;
        border-color: #2563eb;
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
        color: #2563eb;
    }

    /* Buttons inside table */
    .btn-primary {
        background-color: #2563eb;
        border: none;
        box-shadow: 0 4px 12px rgb(37 99 235 / 0.3);
        transition: background-color 0.3s ease, box-shadow 0.3s ease, transform 0.2s ease;
    }

    .btn-primary:hover,
    .btn-primary:focus {
        background-color: #1e40af;
        box-shadow: 0 8px 24px rgb(30 64 175 / 0.5);
        transform: translateY(-2px);
    }

    .btn-danger {
        background-color: #ef4444;
        border: none;
        box-shadow: 0 4px 12px rgb(239 68 68 / 0.3);
        transition: background-color 0.3s ease, box-shadow 0.3s ease, transform 0.2s ease;
    }

    .btn-danger:hover,
    .btn-danger:focus {
        background-color: #b91c1c;
        box-shadow: 0 8px 24px rgb(185 28 28 / 0.5);
        transform: translateY(-2px);
        color: white;
    }

    /* Responsive tweaks */
    @media (max-width: 991.98px) {
        .dashboard-fullscreen {
            padding-left: 1rem;
            padding-right: 1rem;
        }
        .custom-table thead th,
        .custom-table tbody td {
            font-size: 0.9rem;
        }
    }
</style>
