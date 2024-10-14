<!-- Begin Page Content -->
<div class="container-fluid">


    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tambah Surat Aktif Organisasi</h4>
            </div>
            <div class="card-body">
                <form enctype="multipart/form-data" action="<?php echo site_url('adminor/tambah_surat_aktif_organisasi'); ?>" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Anda</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
                    </div>

                    <div class="mb-3">
                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                    </div>

                    <div class="mb-3">
                        <label for="alamat_tinggal" class="form-label">Alamat Tinggal</label>
                        <input type="text" class="form-control" id="alamat_tinggal" name="alamat_tinggal" required>
                    </div>

                    <div class="mb-3">
                        <label for="no_hp" class="form-label">No. HP/WA</label>
                        <input type="tel" class="form-control" id="no_hp" name="no_hp" required>
                    </div>

                    <div class="mb-3">
                        <label for="instansi_kerja" class="form-label">Instansi Kerja</label>
                        <input type="text" class="form-control" id="instansi_kerja" name="instansi_kerja" required>
                    </div>

                    <div class="mb-3">
                        <label for="alamat_instansi_kerja" class="form-label">Alamat Instansi Kerja/Kantor</label>
                        <input type="text" class="form-control" id="alamat_instansi_kerja" name="alamat_instansi_kerja" required>
                    </div>

                    <div class="mb-3">
                        <label for="telepon_kantor_kerja" class="form-label">Telepon Kantor/Instansi</label>
                        <input type="tel" class="form-control" id="telepon_kantor_kerja" name="telepon_kantor_kerja" required>
                    </div>

                    <h6 class="card-title">Upload Karu Tanda Anggota Muhammadiyah/Aisyiyah</h6>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="<?= base_url('assets12/img/profile/avatar.jpg'); ?>" class="img-thumbnail">
                                </div>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="file_path_kartu_tanda_anggota" name="file_path_kartu_tanda_anggota">
                                        <label class="custom-file-label" for="image">Pilih file surat</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h6 class="card-title">Foto Bukti Keaktifan atau Surat Rekomendasi/Keterangan Takmir atau Surat Rekomendasi/Keterangan Lembaga/Majlis dimana yang bersangkutan (ybs) aktif</h6>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="<?= base_url('assets12/img/profile/dokumen.jpg'); ?>" class="img-thumbnail">
                                </div>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="file_path_bukti_keaktifan" name="file_path_bukti_keaktifan">
                                        <label class="custom-file-label" for="image">Pilih file surat</label>
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