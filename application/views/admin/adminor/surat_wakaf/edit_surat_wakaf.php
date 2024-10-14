<!-- Begin Page Content -->
<div class="container-fluid">

    <script src="<?php echo base_url('assets/static/js/initTheme.js') ?>"></script>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Surat Sertifikat Wakaf</h4>
            </div>
            <div class="card-body">
                <form action="<?php echo site_url('adminor/edit_data_wakaf/' . $sertifikat_wakaf['id_wakaf']); ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nama_surat_wakaf" class="form-label">Nama Surat Wakaf</label>
                        <input type="text" class="form-control" id="nama_surat_wakaf" name="nama_surat_wakaf" value="<?php echo isset($sertifikat_wakaf['nama_surat_wakaf']) ? $sertifikat_wakaf['nama_surat_wakaf'] : ''; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="nama_masjid" class="form-label">Nama Masjid</label>
                        <input type="text" class="form-control" id="nama_masjid" name="nama_masjid" value="<?php echo isset($sertifikat_wakaf['nama_masjid']) ? $sertifikat_wakaf['nama_masjid'] : ''; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="gambarBerita" class="form-label">Avatar Saat Ini</label><br>
                        <?php
                        $file_path_sertifikat_wakaf = $sertifikat_wakaf['file_path_sertifikat_wakaf'];
                        $file_extension = pathinfo($file_path_sertifikat_wakaf, PATHINFO_EXTENSION);
                        if (in_array($file_extension, ['jpg', 'jpeg', 'png', 'gif'])) {
                            // Jika file adalah gambar
                            echo '<img src="' . base_url('./uploads/' . $file_path_sertifikat_wakaf) . '" alt="file_path_sertifikat_wakaf" width="100">';
                        } elseif ($file_extension === 'pdf') {
                            // Jika file adalah PDF
                            echo '<embed src="' . base_url('./uploads/' . $file_path_sertifikat_wakaf) . '" type="application/pdf" width="500" height="600" />';
                        } elseif (!empty($file_path_sertifikat_wakaf)) {
                            // Jika file bukan gambar atau PDF
                            echo '<a href="' . base_url('./uploads/' . $file_path_sertifikat_wakaf) . '" target="_blank">' . $file_path_sertifikat_wakaf . '</a>';
                        } else {
                            echo 'Not File';
                        }
                        ?>
                    </div>

                    <div class="mb-3">
                        <label for="gambarBerita" class="form-label">Edit Surat Keputusan</label>
                        <input type="file" class="form-control" id="gambarBerita" name="gambarBerita" accept="">
                        <small id="gambarHelp" class="form-text text-muted">Pilih file gambar baru (format: jpg, jpeg, png).</small>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Edit Surat Keputusan</button>
                </form>
            </div>
        </div>
    </section>

    <script src="<?php echo base_url('/assets/static/js/components/dark.js') ?>"></script>
    <script src="<?php echo base_url('/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') ?>"></script>

    <script src="<?php echo base_url('/assets/compiled/js/app.js') ?>"></script>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->