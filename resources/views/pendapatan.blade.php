<div>
    @extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="dashboard-primary-theme">
    <div class="row g-4">
        <div class="col-md-7">
            <div class="card shadow-lg border-0 h-100">
                <div class="card-header bg-primary text-white text-center py-3">
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
                                <td>{{ $item->karyawan->NamaKaryawan ?? '-' }}</td>
                                <td class="text-center">{{ $item->Jumlah }}</td>
                                <td class="text-center">{{ $item->created_at->format('d-m-Y') }}</td>
                                <td class="text-center">Rp {{ number_format($item->karyawan->Gaji ?? 0, 0, ',', '.') }}</td>
                                <td class="text-center">Rp {{ number_format(($item->Jumlah * ($item->karyawan->Gaji ?? 0)), 0, ',', '.') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">Data pendapatan belum tersedia</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm border-0 h-100">
                    <div class="card-header bg-primary text-white text-center py-3">
                        <h5 class="mb-0 fw-bold">Lihat Pendapatan Karyawan</h5>
                    </div>
                <div class="card-body">
                    <form method="GET" action="{{ route('manajemen.pendapatan') }}">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Pilih Karyawan</label>
                            <select name="IdKaryawan" class="form-select form-control-lg rounded-pill shadow-sm" required>
                                <option value="" disabled selected>Pilih Karyawan</option>
                                @foreach ($karyawans as $karyawan)
                                    <option value="{{ $karyawan->IdKaryawan }}" {{ request('IdKaryawan') == $karyawan->IdKaryawan ? 'selected' : '' }}>{{ $karyawan->NamaKaryawan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Dari tanggal</label>
                            <input class="form-control form-control-lg rounded-pill shadow-sm" type="date" name="start_date" value="{{ request('start_date') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Sampai tanggal</label>
                            <input class="form-control form-control-lg rounded-pill shadow-sm" type="date" name="end_date" value="{{ request('end_date') }}">
                        </div>
                        <button class="btn btn-primary w-100" type="submit">Cari</button>
                    </form>
                    <p class="text-muted small mt-3 mb-0">Pilih karyawan untuk menampilkan pendapatan</p>
                </div>
            </div>
        </div>
    </div>
    </div>
     <div class="row mt-4">
        <div class="col-12">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center py-3">
                    <h5 class="mb-0 fw-bold">Data Pendapatan Terfilter</h5>
                    @if(request()->has('IdKaryawan'))
                        <span class="badge bg-white text-primary fs-6">Total: {{ $totalpendapatan }}</span>
                    @endif
                </div>
                <div class="card-body p-3 table-responsive">
                    @if(request()->has('IdKaryawan'))
                        <div class="mb-3">
                            <a href="/pendapatan" class="btn btn-outline-danger btn-sm rounded-pill px-3">
                                <i class="fas fa-arrow-left me-1"></i> Reset / Kembali
                            </a>
                        </div>
                        <table class="table table-bordered table-hover align-middle">
                            <thead class="table-secondary text-center">
                                <tr>
                                    <th width="50px">No</th>
                                    <th>Nama Karyawan</th>
                                    <th>Jumlah Pendapatan</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pendapatan as $p)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $p->karyawan->NamaKaryawan }}</td>
                                        <td class="text-center fw-bold text-primary">{{ $p->Jumlah }}</td>
                                        <td class="text-center">{{ $p->Tanggal }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted py-4">Data tidak ditemukan untuk kriteria ini</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-info-circle fa-3x text-light mb-3"></i>
                            <h5 class="text-muted">Silakan pilih karyawan dan tanggal, lalu klik tombol <b>Cari</b></h5>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    @endsection
</div>

<style>
    .dashboard-primary-theme {
        font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #2563eb; /* dark slate */
        background-color: #f8fafc; /* very light bg */
        padding: 2rem 1rem;
    }

    .dashboard-primary-theme .card {
        border-radius: 1rem;
        box-shadow: 0 8px 24px rgb(37 99 235 / 0.12);
        border: none;
        background-color: #fff;
        display: flex;
        flex-direction: column;
        transition: box-shadow 0.3s ease, transform 0.3s ease;
    }

    .dashboard-primary-theme .card:hover {
        box-shadow: 0 16px 48px rgb(37 99 235 / 0.25);
        transform: translateY(-6px);
    }


    .dashboard-primary-theme .card-header {
        background-color: #2563eb; /* primary blue */
        color: #ffffff;
        font-weight: 700;
        font-size: 1.3rem;
        border-radius: 1rem 1rem 0 0;
        padding: 1.25rem 1.5rem;
        text-align: center;
        box-shadow: inset 0 -4px 8px rgb(255 255 255 / 0.15);
        letter-spacing: 0.05em;
        user-select: none;
    }

    /* Table container */
    .dashboard-primary-theme .table-responsive {
        border-radius: 0 0 1rem 1rem;
        overflow: hidden;
        box-shadow: inset 0 1px 3px rgb(0 0 0 / 0.05);
    }


    .dashboard-primary-theme table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 14px;
        font-size: 0.95rem;
        color: #334155;
        min-width: 480px;
    }


    .dashboard-primary-theme thead tr {
        background-color: #e0e7ff;
        text-align: center;
        border-radius: 12px;
        box-shadow: 0 1px 2px rgb(37 99 235 / 0.15);
    }

    .dashboard-primary-theme thead th {
        padding: 0.85rem 1.2rem;
        font-weight: 700;
        color: #1e293b;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        border: none;
        user-select: none;
        transition: color 0.3s ease;
    }

    .dashboard-primary-theme thead th:hover {
        color: #2563eb;
        cursor: default;
    }

    /* Table body rows */
    .dashboard-primary-theme tbody tr {
        background-color: #f9fafb;
        box-shadow: 0 6px 14px rgb(0 0 0 / 0.04);
        border-radius: 14px;
        transition: box-shadow 0.3s ease, transform 0.3s ease;
    }

    .dashboard-primary-theme tbody tr:hover {
        box-shadow: 0 12px 26px rgb(37 99 235 / 0.3);
        transform: translateY(-4px);
        cursor: pointer;
    }

    .dashboard-primary-theme tbody td {
        padding: 1rem 1.5rem;
        vertical-align: middle;
        border: none;
        text-align: center;
        color: #334155;
        transition: color 0.25s ease;
    }

    .dashboard-primary-theme tbody td:first-child {
        font-weight: 600;
        color: #2563eb;
    }

    .dashboard-primary-theme form label {
        font-weight: 700;
        color: #334155;
        display: block;
        margin-bottom: 0.5rem;
        user-select: none;
    }

    .dashboard-primary-theme form .form-select,
    .dashboard-primary-theme form .form-control {
        border-radius: 0.75rem;
        border: 1.8px solid #cbd5e1;
        padding: 0.65rem 1.25rem;
        font-size: 1rem;
        color: #334155;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
        box-shadow: none;
    }

    .dashboard-primary-theme form .form-select:focus,
    .dashboard-primary-theme form .form-control:focus {
        outline: none;
        border-color: #6610f2;
        box-shadow: 0 0 8px rgb(37 99 235 / 0.4);
    }


    .dashboard-primary-theme .btn-success {
        background-color: #6610f2;
        border: none;
        font-weight: 700;
        padding: 0.75rem 1.6rem;
        border-radius: 50px;
        box-shadow: 0 8px 24px rgb(37 99 235 / 0.4);
        transition: background-color 0.3s ease, box-shadow 0.3s ease, transform 0.2s ease;
        color: #fff;
    }

    .dashboard-primary-theme .btn-success:hover,
    .dashboard-primary-theme .btn-success:focus {
        background-color: #1e40af;
        box-shadow: 0 12px 32px rgb(30 64 175 / 0.7);
        transform: translateY(-2px);
        color: #fff;
    }

    .dashboard-primary-theme .btn-light {
        color: #64748b;
        border-radius: 50px;
        border: 1.8px solid #cbd5e1;
        padding: 0.55rem 1.4rem;
        font-weight: 600;
        transition: background-color 0.25s ease, color 0.25s ease, border-color 0.25s ease;
        background-color: #fff;
        box-shadow: none;
    }

    .dashboard-primary-theme .btn-light:hover,
    .dashboard-primary-theme .btn-light:focus {
    background-color: #e0e7ff;
    color: #6610f2;
    border-color: #6610f2;
    box-shadow: 0 0 12px rgb(37 99 235 / 0.3);
    }

    @media (max-width: 767px) {
    .dashboard-primary-theme .card-header {
        font-size: 1.15rem;
        padding: 1rem 1.2rem;
    }
    .dashboard-primary-theme tbody td {
        padding: 0.75rem 0.9rem;
        font-size: 0.9rem;
    }
    .dashboard-primary-theme .btn-success,
    .dashboard-primary-theme .btn-light {
        width: 100%;
    }
    }
</style>
