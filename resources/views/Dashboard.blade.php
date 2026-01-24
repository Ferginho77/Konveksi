@extends('layouts.header')


@section('title', 'Dashboard')

@section('content')
<div class="bg-primary pt-10 pb-21"></div>

<div class="container-fluid mt-n22 px-6">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <div class="d-flex justify-content-between align-items-center mb-5">
                <div class="mb-2 mb-lg-0">
                    <h3 class="mb-0 text-white fw-bold">Konveksi Kelambu Rumah Cloteh</h3>
                </div>
                {{-- <div>
                    <a href="#" class="btn btn-white">Create New Project</a>
                </div> --}}
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
        <div class="col-xl-8 col-lg-12 col-md-12 col-12">
            <div class="card h-100 shadow-sm p-3">
                <div class="card-header bg-white py-4">
                    <h4 class="mb-0">Daftar Karyawan</h4>
                </div>
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead class="table-light">
                            <tr>
                                <th>Nama</th>
                                <th>Posisi</th>
                                <th>Total Pendapatan</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($tampil as $t)
                            <tr>
                                <td>{{ $t->NamaKaryawan }}</td>
                                <td>{{ $t->Posisi }}</td>
                                <td>{{ number_format($t->Gaji, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
 
</style>
@endsection