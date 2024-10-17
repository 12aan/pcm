<!-- Begin Page Content -->
<div class="container-fluid">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Profile Sejarah</h4>
                <div class=" row">
                    <div class="col-lg-8 mt-3">
                        <?= $this->session->flashdata('message'); ?>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form enctype="multipart/form-data" action="<?php echo site_url('profile/proses_upload'); ?>" method="post">
                    <div class="mb-3">
                        <label for="tahunJabatan" class="form-label">Tahun Jabatan (Format: YYYY-YYYY)</label>
                        <input type="text" class="form-control" id="tahun_Jabatan" name="tahun_Jabatan" required pattern="^\d{4}-\d{4}$" title="Format tahun jabatan harus: YYYY-YYYY">
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
                                    <img src="<?= base_url('assets12/img/profile/avatar.jpg'); ?>" class="img-thumbnail img-fluid" alt="Avatar" style="max-height: 150px; object-fit: cover;">
                                </div>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="avatar" name="avatar">
                                        <label class="custom-file-label" for="avatar">Pilih file gambar</label>
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

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Daftar Profile</h4>
        </div>
        <div class="mt-4">
            <div class="row"> <!-- Menambahkan kelas gx-1 untuk mengurangi spasi horizontal -->
                <?php foreach ($profile as $profile): ?>
                    <div class="col-md-3 mb-4"> <!-- Margin bawah tetap ada -->
                        <div class="card shadow-sm border-light" style="border-radius: 15px; max-width: 300px; margin: auto;">
                            <div class="text-center">
                                <img src="<?= base_url('./uploads/' . $profile['avatar']); ?>" class="img-fluid img-thumbnail" alt="Foto <?= $profile['nama_pejabat']; ?>" style="width: 120px; height: 120px; object-fit: cover; border-radius: 15px;">
                            </div>

                            <div class="card-body text-center">
                                <h5 class="card-title" style="font-size: 1.2rem;"><?= $profile['nama_pejabat']; ?></h5>
                                <p class="card-text" style="font-size: 0.9rem;">Tahun Jabatan: <?= $profile['tahun_jabatan']; ?></p>
                                <div class="d-flex justify-content-center">
                                    <a href="<?= site_url('profile/edit/' . $profile['id_profile']); ?>" class="btn btn-warning btn-sm mx-1">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a href="<?= site_url('profile/delete/' . $profile['id_profile']); ?>" class="btn btn-danger btn-sm mx-1" onclick="return confirm('Apakah Anda yakin ingin menghapus profile ini?');">
                                        <i class="fas fa-trash"></i> Delete
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
</div>

</div>


<!-- /.container-fluid -->