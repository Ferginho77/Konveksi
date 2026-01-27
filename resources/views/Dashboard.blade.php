@extends('layouts.app')

@section('title', 'Dashboard | Konveksi Cloteh')

@section('content')
<div class="bg-primary pt-10 pb-21"></div>

<div class="container-fluid mt-n22 px-6">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-12">
            <div class="d-flex justify-content-between align-items-center mb-5">
                <div class="mb-2 mb-lg-0">
                    <h2 class="mb-0 text-white fw-bold">Konveksi Rumah Cloteh</h2>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h4 class="mb-0 fs-5 text-muted">Ketersediaan Barang</h4>
                        </div>
                        <div class="icon-shape icon-md bg-light-primary text-primary rounded-2">
                            <i class="fas fa-box"></i>
                        </div>
                    </div>
                    <div>
                        <h1 class="fw-bold">{{ $barang }}</h1>
                        <p class="mb-0">Ketersediaan Bahan Kelambu</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h4 class="mb-0 fs-5 text-muted">Jumlah Karyawan</h4>
                        </div>
                        <div class="icon-shape icon-md bg-light-primary text-primary rounded-2">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                    <div>
                        <h1 class="fw-bold">{{ $karyawan }}</h1>
                        <p class="mb-0">Jumlah Karyawan Yang Aktif</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h4 class="mb-0 fs-5 text-muted">Jumlah Kelambu Tersedia</h4>
                        </div>
                        <div class="icon-shape icon-md bg-light-primary text-primary rounded-2">
                            <i class="fas fa-boxes"></i>
                        </div>
                    </div>
                    <div>
                        <h1 class="fw-bold">{{ $produk->sum('Stok') }}</h1>
                        <p class="mb-0">Jumlah Kelambu Tersedia</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row mt-5">
        <div class="col-md-12 col-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary py-4 d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 text-white">Daftar Karyawan</h4>
                </div>
                <div class="table-responsive">
                    <table class="table text-nowrap mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Nama Karyawan</th>
                                <th>Posisi</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tampil as $t)
                            <tr>
                                <td class="align-middle fw-bold text-dark">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-sm bg-light-primary text-primary rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 30px; height: 30px; font-size: 12px;">
                                            {{ substr($t->NamaKaryawan, 0, 1) }}
                                        </div>
                                        {{ $t->NamaKaryawan }}
                                    </div>
                                </td>
                                <td class="align-middle text-muted">{{ $t->Posisi }}</td>
                               @if($t->Status == 'Aktif')
                                        <span class="badge bg-light-success text-success">Aktif</span>
                                    @else
                                        <span class="badge bg-light-secondary text-secondary">NonAktif</span>
                                    @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>

    .card {
        border-radius: 1.5rem;
        padding: 2rem 2.5rem;
        font-size: 1.1rem;
        transition: transform .25s ease, box-shadow .25s ease;
    }

    .card:hover {
        transform: translateY(-6px);
        box-shadow: 0 15px 35px rgba(0,0,0,.08);
    }


    .card h1 {
        font-size: 3.5rem
        transition: color .3s ease;
    }

    .card:hover h1 {
        color: #0d6efd;
    }

    h2.fw-bold.text-white {
        font-size: 3.5rem;
        font-weight: 900;
        letter-spacing: 0.1em;
        text-shadow: 1px 1px 4px rgba(0,0,0,0.3);
    }


    .table-responsive {
        border-radius: 1rem;
        overflow: hidden;
        margin-top: 1.5rem
    }


    .table thead th {
        background: linear-gradient(180deg, #f8f9fa, #eef1f5);
        border-bottom: none;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        color: #6c757d;
        padding: 1rem;
    }


    .table tbody td {
        padding: 1rem;
        border-top: none;
        vertical-align: middle;
    }


    .table tbody tr {
        transition: background-color .25s ease, transform .15s ease;
    }

    .table tbody tr:hover {
        background-color: #f8f9fc;
        transform: scale(1.005);
    }


    .avatar {
        background: linear-gradient(135deg, #0d6efd, #6610f2) !important;
        color: #fff !important;
        font-weight: 700;
    }


    .table td.fw-bold {
        font-size: 0.95rem;
    }


    .badge.bg-light-success {
        background-color: rgba(25, 135, 84, 0.15) !important;
        color: #198754 !important;
        font-weight: 600;
        padding: 0.45rem 0.8rem;
        border-radius: 999px;
    }


    .table tbody tr:not(:last-child) {
        border-bottom: 1.5px solid #f1f3f5;
    }
</style>
