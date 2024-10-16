<!-- Begin Page Content -->
<div class="container-fluid">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Profile</h4>
            </div>
            <div class="card-body">
                <form enctype="multipart/form-data" action="<?php echo site_url('profile/proses_upload'); ?>" method="post">
                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('error')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $this->session->flashdata('error'); ?>
                        </div>
                    <?php endif; ?>

                    <div class="mb-3">
                        <label for="tahunJabatan" class="form-label">Tahun Jabatan</label>
                        <input type="text" class="form-control" id="tahunJabatan" name="tahunJabatan" required>
                    </div>

                    <div class="mb-3">
                        <label for="nama_pejabat" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama_pejabat" name="nama_pejabat" required>
                    </div>

                    <div class="mb-3">
                        <label for="gambar" class="form-label">Upload Gambar</label>
                        <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*" required>
                        <small id="gambarHelp" class="form-text text-muted">Pilih file gambar (format: jpg, jpeg, png).</small>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Unggah Data</button>
                </form>

            </div>
        </div>
    </section>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->