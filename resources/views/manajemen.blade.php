@extends('layouts.app')

@section('title', 'Manajemen Karyawan')

@section('content')
<div class="row mt-4">
    <div class="col-12">

        <div class="card shadow-sm border-0">

            <!-- CARD HEADER -->
            <div class="card-header d-flex justify-content-between align-items-center flex-wrap">
                <div class="d-flex align-items-center gap-3">
                    <img src="{{ asset('img/staff.png') }}" width="45" alt="Karyawan">
                    <h5 class="mb-0 fw-bold">Manajemen Karyawan</h5>
                </div>

                <button
                    data-bs-toggle="modal"
                    data-bs-target="#TambahKaryawan"
                    class="btn btn-success btn-sm">
                    + Tambah Karyawan
                </button>
            </div>

            <!-- CARD BODY -->
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Nama</th>
                                <th>Posisi</th>
                                <th>Gaji</th>
                                <th>Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($karyawan as $k)
                            <tr>
                                <td class="fw-semibold">{{ $k->NamaKaryawan }}</td>
                                <td class="text-muted">{{ $k->Posisi }}</td>
                                <td>Rp {{ number_format($k->Gaji, 0, ',', '.') }}</td>
                                <td>
                                    @if($k->Status == 'Aktif')
                                        <span class="badge bg-success">Aktif</span>
                                    @else
                                        <span class="badge bg-secondary">NonAktif</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-primary btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#EditKaryawan"
                                        data-id="{{ $k->IdKaryawan }}"
                                        data-nama="{{ $k->NamaKaryawan }}"
                                        data-posisi="{{ $k->Posisi }}"
                                        data-gaji="{{ $k->Gaji }}"
                                        data-status="{{ $k->Status }}">
                                        Edit
                                    </button>

                                    <form action="{{ route('karyawan.destroy', $k->IdKaryawan) }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Yakin ingin menghapus karyawan ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
</div>

@include('modals.tambahkaryawan')
@include('modals.editkaryawan')
@endsection


