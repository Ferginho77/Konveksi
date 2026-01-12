<div>
    <div class="modal fade" id="TambahKaryawan" tabindex="-1" aria-labelledby="TambahKaryawanLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="TambahKaryawanLabel">Form Tambah Karyawan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <h3>Tambah Karyawan</h3>
                        <form action="{{ route('karyawan.tambah') }}" method="POST"  enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" name="NamaKaryawan" class="form-control" required>
                            </div>                                                  
                            <div class="mb-3">
                                <label class="form-label">Posisi</label>
                                <select name="Posisi" id="" class="form-select" required>
                                    <option value="">-- Pilih Posisi --</option> 
                                    <option value="Renda">Renda</option>
                                    <option value="Cutting">Cutting</option>
                                    <option value="Polet">Polet</option>
                                    <option value="Seleting">Seleting</option>
                                    <option value="Obras">Obras</option>
                                    <option value="Packing">Packing</option>
                                </select>
                                <div class="mb-3">
                                <label class="form-label">Gaji</label>
                                <input type="text" name="Gaji" class="form-control" required>
                            </div>
                                <input type="hidden" name="Status" value="Aktif">
                            <button type="submit" class="btn btn-outline-primary">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
   </div>  
</div>