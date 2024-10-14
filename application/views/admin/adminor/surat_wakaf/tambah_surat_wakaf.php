<!-- Begin Page Content -->
<div class="container-fluid">

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tambah Surat Sertifikat Wakaf</h4>
            </div>
            <div class="card-body">
                <form enctype="multipart/form-data" action="<?php echo site_url('adminor/tambah_surat_wakaf'); ?>" method="post">
                    <div class="mb-3">
                        <label for="nama_surat_wakaf" class="form-label">Nama Surat Wakaf</label>
                        <input type="text" class="form-control" id="nama_surat_wakaf" name="nama_surat_wakaf" required>
                    </div>

                    <div class="mb-3">
                        <label for="nama_masjid" class="form-label">Nama Masjid</label>
                        <input type="text" class="form-control" id="nama_masjid" name="nama_masjid" required>
                    </div>

                    <h6 class="card-title">Upload Berkas Sertifikat Wakaf</h6>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="<?= base_url('assets12/img/profile/dokumen.jpg'); ?>" class="img-thumbnail">
                                </div>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="file_path_sertifikat_wakaf" name="file_path_sertifikat_wakaf">
                                        <label class="custom-file-label" for="image">Pilih file seritikat wakaf</label>
                                    </div>
                                </div>
                            </div>
                        </div>
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