<div>
    <div class="modal fade" id="EditKaryawan" tabindex="-1" aria-labelledby="EditKaryawanLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="EditKaryawanLabel">Form Edit Karyawan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <h3>Edit Karyawan</h3>
                        <form id="EditKaryawanForm" action="{{ route('karyawan.edit') }}" method="POST"  enctype="multipart/form-data">
                            @csrf
                            <input type="text" id="id" name="IdKaryawan" hidden>
                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" name="NamaKaryawan" class="form-control" id="NamaKaryawan" required>
                            </div>                                                  
                            <div class="mb-3">
                                <label class="form-label">Posisi</label>
                                <select name="Posisi" id="Posisi" class="form-select" required>
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
                                <input type="text" id="Gaji" name="Gaji" class="form-control" required>
                            </div>
                                <select name="Status" id="Status" class="form-select">Status
                                     <option value="Aktif">Aktif</option>
                                     <option value="NonAktif">NonAktif</option>
                                </select>
                            <button type="submit" class="btn btn-outline-primary">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
   </div>  
</div>

<script>
    document.addEventListener('DOMContentLoaded', function(){
        const EditKaryawanModal = document.getElementById('EditKaryawan');
        EditKaryawanModal.addEventListener('show.bs.modal', function(event){
            const button = event.relatedTarget;
            const id = button.getAttribute('data-id');
            const nama = button.getAttribute('data-nama');
            const posisi = button.getAttribute('data-Posisi');
            const gaji = button.getAttribute('data-gaji');
            const status = button.getAttribute('data-status');

            EditKaryawanModal.querySelector('#id').value = id;
            EditKaryawanModal.querySelector('#NamaKaryawan').value = nama;
            EditKaryawanModal.querySelector('#Posisi').value = posisi;
            EditKaryawanModal.querySelector('#Gaji').value = gaji;
            EditKaryawanModal.querySelector('#Status').value = status;

            const form = document.getElementById('EditKaryawanForm');
            form.action = `/karyawan/edit`;
        })
    })
</script>