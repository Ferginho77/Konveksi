<div class="modal fade" id="Editbarang" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Edit Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form id="EditbarangForm" method="POST" action="{{ route('barang.edit') }}">
                    @csrf

                    <input type="hidden" name="id" id="id">

                    <div class="mb-3">
                        <label class="form-label">Nama Barang</label>
                        <input type="text" name="NamaBarang" id="NamaBarang" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Stok</label>
                        <input type="number" name="Stok" id="Stok" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="Deskripsi" id="Deskripsi" class="form-control"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const editModal = document.getElementById('Editbarang');

    editModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;

        const id = button.getAttribute('data-id');
        const namaBarang = button.getAttribute('data-namabarang');
        const stok = button.getAttribute('data-stok');
        const deskripsi = button.getAttribute('data-deskripsi');

        editModal.querySelector('#id').value = id;
        editModal.querySelector('#NamaBarang').value = namaBarang;
        editModal.querySelector('#Stok').value = stok;
        editModal.querySelector('#Deskripsi').value = deskripsi;
         const form = document.getElementById('EditbarangForm');
            form.action = `/barang/edit`;
    });
});
</script>
