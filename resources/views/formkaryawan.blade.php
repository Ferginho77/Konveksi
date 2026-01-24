<div>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Karyawan</title>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    </head>
    <body>
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
    </body>
    </html>
</div>
