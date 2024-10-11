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
                                    <li class="breadcrumb-item active" aria-current="page"> Tambah Surat Keluar</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tambah Surat Keluar</h4>
                        </div>
                        <div class="card-body">
                            <?php if ($this->session->flashdata('success')) { ?>
                                <div class="alert alert-success">
                                    <?php echo $this->session->flashdata('success'); ?>
                                </div>
                            <?php } ?>

                            <?php if ($this->session->flashdata('error')) { ?>
                                <div class="alert alert-danger">
                                    <?php echo $this->session->flashdata('error'); ?>
                                </div>
                            <?php } ?>

                            <form enctype="multipart/form-data" action="<?php echo site_url('adminor/tambah_surat_keluar_agenda'); ?>" method="post">
                                <div class="mb-3">
                                    <label for="agenda" class="form-label">Agenda</label>
                                    <!-- Menampilkan dropdown untuk memilih agenda -->
                                    <select class="form-control" id="agenda" name="agenda" required>
                                        <option value="">Pilih Agenda</option>
                                        <?php
                                        // Filter array untuk menghapus entri yang duplikat berdasarkan nilai 'agenda'
                                        $unique_agendas = array_unique(array_column($agenda_list, 'agenda'));
                                        foreach ($unique_agendas as $agenda) : ?>
                                            <option value="<?php echo $agenda; ?>"><?php echo $agenda; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="nama_surat" class="form-label">Nama Surat</label>
                                    <input type="text" class="form-control" id="nama_surat" name="nama_surat" required>
                                </div>
                                <div class="mb-3">
                                    <label for="file_path_surat" class="form-label">Upload Surat</label>
                                    <input type="file" class="form-control" id="file_path_surat" name="file_path_surat">
                                    <small id="gambarHelp" class="form-text text-muted">Pilih file (format: jpg, jpeg, png, pdf, dll).</small>
                                </div>
                                <!-- Tampilkan berkas yang diunggah sebelumnya -->
                                <div class="mb-3">
                                    <label for="file_path_undangan" class="form-label">Upload Undangan</label>
                                    <input type="file" class="form-control" id="file_path_undangan" name="file_path_undangan">
                                    <small id="gambarHelp" class="form-text text-muted">Pilih file (format: jpg, jpeg, png, pdf, dll).</small>
                                </div>
                                <div class="mb-3">
                                    <label for="file_path_photo" class="form-label">Upload File Photo</label>
                                    <input type="file" class="form-control" id="file_path_photo" name="file_path_photo">
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