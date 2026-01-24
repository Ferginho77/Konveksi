<div class="modal fade" id="EditStok" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Edit Stok</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                 <form action="{{ route('produk.editStok') }}" id="EditStokForm" method="POST">
                @csrf

                {{-- ID PRODUK --}}
                <input type="text" id="id" name="produk_id" hidden> 

                {{-- NAMA PRODUK --}}
                <div class="mb-3">
                    <label class="form-label">Nama Produk</label>
                    <input type="text" id="NamaProduk" class="form-control" readonly>
                </div>

                {{-- STOK LAMA --}}
                <div class="mb-3">
                    <label class="form-label">Stok Saat Ini</label>
                    <input type="number" id="Stok" class="form-control" readonly>
                </div>

                {{-- STOK BARU --}}
                <div class="mb-3">
                    <label class="form-label">Stok Baru</label>
                    <input type="number" name="stok_baru" class="form-control" required min="0">
                </div>

                <button type="submit" class="btn btn-primary">
                    Simpan Perubahan
                </button>
            </form>
            </div>
        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const editModal = document.getElementById('EditStok');

    editModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;

        const id = button.getAttribute('data-id');
        const NamaProduk = button.getAttribute('data-nama');
        const stok = button.getAttribute('data-stok');

        editModal.querySelector('#id').value = id;
        editModal.querySelector('#NamaProduk').value = NamaProduk;
        editModal.querySelector('#Stok').value = stok;
         const form = document.getElementById('EditStokForm');
            form.action = `/produk/editStok`;
    });
});
</script>
