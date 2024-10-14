<!-- Begin Page Content -->
<div class="container-fluid">

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tambah Surat Keluar Agenda</h4>
            </div>
            <div class="card-body">
                <form enctype="multipart/form-data" action="<?php echo site_url('adminor/tambah_surat_keluar_agenda'); ?>" method="post">
                    <div class="mb-3">
                        <label for="agenda" class="form-label">Agenda</label>
                        <select class="form-control" id="agenda" name="agenda" required>
                            <option value="">Pilih Agenda</option>
                            <?php
                            // Mengambil hanya nilai unik dari kolom 'agenda'
                            $unique_agendas = array_unique(array_column($agenda_list, 'agenda'));
                            foreach ($unique_agendas as $agenda) : ?>
                                <option value="<?php echo $agenda; ?>"><?php echo $agenda; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nama_surat" class="form-label">Nama Surat</label>
                        <input type="text" class="form-control" id="nama_surat" name="nama_surat">
                    </div>

                    <!-- Input select tambahan -->
                    <div class="mb-3">
                        <label for="gantiPasswordCheckbox" class="form-label">Apakah Anda ingin Upload Berkas?</label>
                        <div class="form-check" id="gantiPassword">
                            <input class="form-check-input" type="checkbox" id="gantiPasswordCheckbox" name="gantiPassword" value="1">
                            <label class="form-check-label" for="gantiPasswordCheckbox">Ya</label>
                        </div>
                    </div>

                    <div id="fileUploads" style="display: none;">
                        <h6 class="card-title">Upload Surat</h6>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="<?= base_url('assets12/img/profile/dokumen.jpg'); ?>" class="img-thumbnail">
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="file_path_surat" name="file_path_surat">
                                            <label class="custom-file-label" for="uploadSurat">Pilih fIle surat</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h6 class="card-title">Upload Undangan</h6>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="<?= base_url('assets12/img/profile/dokumen.jpg'); ?>" class="img-thumbnail">
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="file_path_undangan" name="file_path_undangan">
                                            <label class="custom-file-label" for="uploadUndangan">Pilih file undangan</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h6 class="card-title">Upload File Foto</h6>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="<?= base_url('assets12/img/profile/dokumen.jpg'); ?>" class="img-thumbnail">
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="file_path_photo" name="file_path_photo">
                                            <label class="custom-file-label" for="uploadFoto">Pilih file foto</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        // Menampilkan atau menyembunyikan file uploads berdasarkan checkbox
                        document.getElementById('gantiPasswordCheckbox').addEventListener('change', function() {
                            var fileUploads = document.getElementById('fileUploads');
                            fileUploads.style.display = this.checked ? 'block' : 'none';
                        });

                        // Menampilkan nama file yang dipilih
                        document.querySelectorAll('.custom-file-input').forEach(input => {
                            input.addEventListener('change', function(e) {
                                const fileName = e.target.files[0] ? e.target.files[0].name : 'Pilih file';
                                const label = this.nextElementSibling;
                                label.innerText = fileName;
                            });
                        });
                    </script>

                    <button type="submit" class="btn btn-primary btn-sm">Unggah Berkas</button>
                </form>
            </div>
        </div>
    </section>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->