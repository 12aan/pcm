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

                    <h6 class="card-title">Upload Foto</h6>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="<?= base_url('assets12/img/profile/avatar.jpg'); ?>" class="img-thumbnail">
                                </div>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="file_path_kartu_tanda_anggota" name="file_path_kartu_tanda_anggota">
                                        <label class="custom-file-label" for="image">Pilih file gambar</label>
                                    </div>
                                </div>
                            </div>
                        </div>
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