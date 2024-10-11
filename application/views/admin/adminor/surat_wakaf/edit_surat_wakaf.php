<!-- Begin Page Content -->
<div class="container-fluid">

    <script src="<?php echo base_url('assets/static/js/initTheme.js') ?>"></script>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Surat Sertifikat Wakaf</h4>
            </div>
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nama_surat_wakaf" class="form-label">Nama Surat Wakaf</label>
                        <input type="text" class="form-control" id="nama_surat_wakaf" name="nama_surat_wakaf" value="" required>
                    </div>

                    <div class="mb-3">
                        <label for="nama_masjid" class="form-label">Nama Masjid</label>
                        <input type="text" class="form-control" id="nama_masjid" name="nama_masjid" value="" required>
                    </div>
                    <div class="mb-3">
                        <label for="gambarBerita" class="form-label">Avatar Saat Ini</label><br>

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