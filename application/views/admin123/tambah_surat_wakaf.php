<body>
    <script src="<?php echo base_url('assets/static/js/initTheme.js') ?>"></script>
    <div id="app">

        <div id="main-content">

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">

                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/admin') ?>">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> Tambah Surat Sertifikat Wakaf</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
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
                                <div class="mb-3">
                                    <label for="file_path_sertifikat_wakaf" class="form-label">Upload Berkas Sertifikat Wakaf</label>
                                    <input type="file" class="form-control" id="file_path_sertifikat_wakaf" name="file_path_sertifikat_wakaf">
                                    <small id="gambarHelp" class="form-text text-muted">Pilih file (format: jpg, jpeg, png, pdf, dll).</small>
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm">Unggah Berkas</button>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url('/assets/static/js/components/dark.js') ?>"></script>
    <script src="<?php echo base_url('/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') ?>"></script>

    <script src="<?php echo base_url('/assets/compiled/js/app.js') ?>"></script>


</body>

</html>