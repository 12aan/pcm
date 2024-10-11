<!-- Begin Page Content -->
<div class="container-fluid">

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tambah Surat Masuk Agenda</h4>
            </div>
            <div class="card-body">
                <form enctype="multipart/form-data" action="<?php echo site_url('adminor/tambah_surat'); ?>" method="post">
                    <div class="mb-3">
                        <label for="agenda" class="form-label">Agenda</label>
                        <input type="text" class="form-control" id="agenda" name="agenda" required>
                    </div>

                    <div class="mb-3">
                        <label for="nama_surat" class="form-label">Nama Surat</label>
                        <input type="text" class="form-control" id="nama_surat" name="nama_surat">
                    </div>

                    <div class="mb-3">
                        <label for="file_path" class="form-label">Upload Berkas</label>
                        <input type="file" class="form-control" id="file_path" name="file_path">
                        <small id="gambarHelp" class="form-text text-muted">Pilih file (format: jpg, jpeg, png, pdf, dll).</small>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Unggah Berkas</button>
                </form>
            </div>
        </div>
    </section>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->