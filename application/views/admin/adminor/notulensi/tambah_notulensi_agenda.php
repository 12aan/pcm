<!-- Begin Page Content -->
<div class="container-fluid">

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tambah Surat Notulensi Agenda</h4>
            </div>
            <div class="card-body">
                <?php if ($this->session->flashdata('success')) { ?>
                    <div class="alert alert-success">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php } ?>

                <?php if ($this->session->flashdata('error')) { ?>
                    <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>
                <?php } ?>

                <form enctype="multipart/form-data" action="<?php echo site_url('adminor/tambah_surat_notulensi'); ?>" method="post">
                    <div class="mb-3">
                        <label for="agenda" class="form-label">Agenda</label>
                        <input type="text" class="form-control" id="agenda" name="agenda" required>
                    </div>

                    <div class="mb-3">
                        <label for="nama_surat" class="form-label">Nama Surat</label>
                        <input type="text" class="form-control" id="nama_surat" name="nama_surat" required>
                    </div>
                    <!-- Tampilkan berkas yang diunggah sebelumnya -->
                    <div class="mb-3">
                        <label for="file_path_undangan" class="form-label">Upload Undangan</label>
                        <input type="file" class="form-control" id="file_path_undangan" name="file_path_undangan">
                        <small id="gambarHelp" class="form-text text-muted">Pilih file (format: jpg, jpeg, png, pdf, dll).</small>
                    </div>
                    <div class="mb-3">
                        <label for="file_path_notulensi" class="form-label">Upload File Notulensi</label>
                        <input type="file" class="form-control" id="file_path_notulensi" name="file_path_notulensi" value="Not Avatar">
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