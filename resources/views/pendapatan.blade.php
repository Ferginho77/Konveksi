<div>
    @extends('layouts.header')

@section('title', 'Dashboard')

@section('content')
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
                                    {{ number_format($item->Jumlah, 0, ',', '.') }}
                                </td>

                                <td class="text-center">
                                    {{ $item->created_at->format('d-m-Y') }}
                                </td>

                                <td class="text-center">
                                    Rp {{ number_format($item->karyawan->Gaji ?? 0, 0, ',', '.') }}
                                </td>
                                <td class="text-center">
                                    Rp {{ number_format(($item->Jumlah * ($item->karyawan->Gaji ?? 0)), 0, ',', '.') }}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">
                                    Data pendapatan belum tersedia
                                </td>
                            </tr>
                            @endforelse
                            </tbody>

                    </table>

</div>
@endsection
</div>
