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
                                    <li class="breadcrumb-item active" aria-current="page"> Tambah data Pustaka</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tambah Data Pustaka</h4>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo site_url('pustaka/tambah_data_pustaka'); ?>" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="judul" class="form-label">Judul</label>
                                    <!-- Mengganti input teks dengan textarea -->
                                    <textarea class="form-control" id="judul" name="judul_pustaka" rows="5" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
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



</body>

</html>