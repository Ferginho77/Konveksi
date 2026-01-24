<div>
    @extends('layouts.header')

@section('title', 'Dashboard')

@section('content')
<div class="row g-4">
    <div class="col-md-7">
        <div class="card shadow-lg border-0 h-100">
            <div class="card-header bg-dark text-white text-center py-3">
                <h5 class="mb-0 fw-bold">Daftar Pendapatan</h5>
            </div>
            <div class="card-body p-3 table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-secondary text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Total Pendapatan</th>
                            <th>Tanggal</th>
                            <th>Total Gaji</th>
                            <th>Hasil</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pendapatan as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>
                                {{ $item->karyawan->NamaKaryawan ?? '-' }}
                            </td>
                            <td class="text-center">
                                {{ $item->total }}
                            </td>
                            <td class="text-center">
                                {{ $item->created_at->format('d-m-Y') }}
                            </td>
                            <td class="text-center">
                                Rp {{ number_format($item->karyawan->Gaji ?? 0, 0, ',', '.') }}
                            </td>
                            <td class="text-center">
                                Rp {{ number_format(($item->total * ($item->karyawan->Gaji ?? 0)), 0, ',', '.') }}
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">
                                Data pendapatan belum tersedia
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card shadow-lg border-0 h-100">
            <div class="card-header bg-primary text-white text-center py-3">
                <h5 class="mb-0 fw-bold">Input Pendapatan</h5>
            </div>
            <div class="card-body p-4">
                <form action="" method="POST">
                    @csrf
                   <div class="mb-3">
                        <label for="NamaKaryawan" class="form-label fw-bold">Nama Karyawan</label>
                        <select name="NamaKaryawan" id="karyawan_id" class="form-select" required>
                            <option value="" disabled selected>Pilih Karyawan</option>
                            @foreach ($karyawans as $karyawan)
                                <option value="{{ $karyawan->id }}">{{ $karyawan->NamaKaryawan }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="Jumlah" class="form-label fw-bold">Total Pendapatan</label>
                        <input type="number" name="JumlahPendapatanAwal" id="Jumlah" class="form-control" placeholder="Masukkan total pendapatan" required>
                   </div>
                    <div class="d-grid gap-2 mt-4">
                        <button type="submit" class="btn btn-success fw-bold py-2">
                            Simpan
                        </button>
                        <a href="/produk" class="btn btn-light btn-sm text-muted">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>  
</div>
</div>       
@endsection
</div>
