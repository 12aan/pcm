<body>
    <script src="<?php echo base_url('assets/static/js/initTheme.js') ?>"></script>
    <div id="app">

        <div id="main-content">
            <!-- <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header> -->

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">

                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/admin/') ?>">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Profile Sejarah</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
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

        </div>
    </div>
    <script src="<?php echo base_url('/assets/static/js/components/dark.js') ?>"></script>
    <script src="<?php echo base_url('/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') ?>"></script>

    <script src="<?php echo base_url('/assets/compiled/js/app.js') ?>"></script>




</body>

</html>