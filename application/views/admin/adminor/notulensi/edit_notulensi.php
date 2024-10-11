<!-- Begin Page Content -->
<div class="container-fluid">

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Surat Notulensi</h4>
            </div>
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="agenda" class="form-label">Agenda</label>
                        <input type="text" class="form-control" id="agenda" name="agenda" value="" required>
                    </div>

                    <div class="mb-3">
                        <label for="nama_surat" class="form-label">Nama Surat</label>
                        <input type="text" class="form-control" id="nama_surat" name="nama_surat" value="" required>
                    </div>

                    <!-- FILE PATH UNDANGAN -->
                    <div class="mb-3">
                        <label for="file_path_undangan" class="form-label">Undangan saat ini</label><br>

                    </div>
                    <div class="mb-3">
                        <label for="file_path_undangan" class="form-label">Edit Undangan</label>
                        <input type="file" class="form-control" id="file_path_undangan" name="file_path_undangan" accept="">
                        <small id="gambarHelp" class="form-text text-muted">Pilih file gambar baru (format: jpg, jpeg, png).</small>
                    </div>
                    <!-- END FILE PATH UNDANGAN -->


                    <!-- FILE PATH NOTULENSI -->
                    <div class="mb-3">
                        <label for="file_path_notulensi" class="form-label">Photo Saat Ini</label><br>

                    </div>
                    <div class="mb-3">
                        <label for="file_path_notulensi" class="form-label">Edit Photo</label>
                        <input type="file" class="form-control" id="file_path_notulensi" name="file_path_notulensi" accept="">
                        <small id="gambarHelp" class="form-text text-muted">Pilih file gambar baru (format: jpg, jpeg, png).</small>
                    </div>
                    <!-- END FILE PHOTO -->

                    <button type="submit" class="btn btn-primary btn-sm">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </section>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->