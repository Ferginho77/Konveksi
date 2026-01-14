<div>
    @extends('layouts.header')
    
     @section('title', 'Manajemen Karyawan')
     @section('content')
<div class="container mt-4">
    <a href="/" class="btn btn-danger">Kembali</a>
    <div class="card mt-4">
            <div class="d-flex justify-content-between align-items-center mb-2 flex-wrap">
                <div class="section-title mb-0">
                    <img src="{{ asset('img/staff.png') }}" width="50px" height="70px" alt="Karyawan">
                    Manajemen Karyawan
                </div>
            </div>
            <div class="mb-2">
                <button 
                data-bs-toggle="modal"
                data-bs-target="#TambahKaryawan"
                class="btn btn-success btn-sm">Tambah Karyawan</button>
            </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Posisi</th>
                            <th>Gaji</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($karyawan as $k)
        <tr>
            <td>{{ $k->NamaKaryawan }}</td>
            <td>{{ $k->Posisi }}</td>
            <td>{{ number_format($k->Gaji, 0, ',', '.') }}</td>
            <td>
                @if($k->Status == 'Aktif')
                    <span class="fs-6 badge bg-success">Aktif</span> 
                @else
                    <span class="fs-6 badge bg-secondary">NonAktif</span>
                @endif
            </td>
            <td>
                <button class="btn btn-primary btn-sm"
                    data-bs-toggle="modal"
                    data-bs-target="#EditKaryawan"
                    data-id="{{ $k->IdKaryawan }}"
                    data-nama="{{ $k->NamaKaryawan }}"
                    data-Posisi="{{ $k->Posisi }}"
                    data-gaji="{{ $k->Gaji }}"
                    data-status="{{ $k->Status }}"
                >Edit</button>

                <form action="{{ route('karyawan.destroy', $k->IdKaryawan) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus karyawan ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
                    </tbody>
                </table>
            </div>
    </div>
    @endsection
</div>

@include('modals.tambahkaryawan');
@include('modals.editkaryawan');