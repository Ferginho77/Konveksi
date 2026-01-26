<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Pendapatan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">

    <!-- ===== FORM AREA ===== -->
    <div class="row g-4">

        <!-- FORM INPUT PENDAPATAN -->
        <div class="col-md-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <h5 class="fw-bold mb-4">Input Pendapatan</h5>

                    <form action="{{ route('tambah.pendapatan') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Karyawan</label>
                            <select name="IdKaryawan" class="form-select" required>
                                <option value="" disabled selected>Pilih Karyawan</option>
                                @foreach ($karyawans as $karyawan)
                                    <option value="{{ $karyawan->IdKaryawan }}">
                                        {{ $karyawan->NamaKaryawan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Jumlah Pendapatan</label>
                            <input type="number" name="Jumlah" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-success w-100 fw-bold">
                            Simpan Pendapatan
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- FORM FILTER / PILIH KARYAWAN -->
        <div class="col-md-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <h5 class="fw-bold mb-4">Lihat Pendapatan Karyawan</h5>

                    <form method="GET" action="{{ route('filtering.pendapatan') }}">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Pilih Karyawan</label>
                            <select name="IdKaryawan" class="form-select" required>
                                <option value="" disabled selected>Pilih Karyawan</option>
                                @foreach ($karyawans as $karyawan)
                                    <option value="{{ $karyawan->IdKaryawan }}"
                                        {{ request('IdKaryawan') == $karyawan->IdKaryawan ? 'selected' : '' }}>
                                        {{ $karyawan->NamaKaryawan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <label>Dari tanggal</label>
                        <input class="form-control" type="date" name="start_date" value="{{ request('start_date') }}">

                        <label>Sampai tanggal</label>
                        <input class="form-control" type="date" name="end_date" value="{{ request('end_date') }}">

                        <button class="btn btn-primary mt-4" type="submit">Cari</button>
                    </form>


                    <p class="text-muted small">
                        Pilih karyawan untuk menampilkan pendapatan
                    </p>
                </div>
            </div>
        </div>

    </div>

    <!-- ===== TABLE AREA ===== -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="fw-bold mb-4">Data Pendapatan</h5>
                    <h3>Total Pendapatan : {{ $totalpendapatan }}</h3>
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama Karyawan</th>
                                <th>Jumlah Pendapatan</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                       <tbody>
                            @if(request()->has('IdKaryawan'))
                            <a href="/formkaryawan" class="btn btn-danger m-3">Kembali</a>
                                @forelse ($pendapatan as $p)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $p->karyawan->NamaKaryawan }}</td>
                                        <td> {{ $p->Jumlah}}</td>
                                        <td>{{$p->Tanggal}}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted">
                                            Data tidak ditemukan
                                        </td>
                                    </tr>
                                @endforelse
                            @else
                                <tr>
                                    <td colspan="4" class="text-center text-muted">
                                        Silakan pilih karyawan dan tanggal lalu klik <b>Cari</b>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

</div>

</body>
</html>
