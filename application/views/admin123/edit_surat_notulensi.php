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
                                    <li class="breadcrumb-item active" aria-current="page"> Edit Surat Notulensi</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Surat Notulensi</h4>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo site_url('adminor/edit_data_notulensi/' . $notulensi['id_notulensi']); ?>" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="agenda" class="form-label">Agenda</label>
                                    <input type="text" class="form-control" id="agenda" name="agenda" value="<?php echo isset($notulensi['agenda']) ? $notulensi['agenda'] : ''; ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="nama_surat" class="form-label">Nama Surat</label>
                                    <input type="text" class="form-control" id="nama_surat" name="nama_surat" value="<?php echo isset($notulensi['nama_surat']) ? $notulensi['nama_surat'] : ''; ?>" required>
                                </div>

                                <!-- FILE PATH UNDANGAN -->
                                <div class="mb-3">
                                    <label for="file_path_undangan" class="form-label">Undangan saat ini</label><br>
                                    <?php
                                    $file_path_undangan = $notulensi['file_path_undangan'];
                                    $file_extension = pathinfo($file_path_undangan, PATHINFO_EXTENSION);
                                    if (in_array($file_extension, ['jpg', 'jpeg', 'png', 'gif'])) {
                                        // Jika file adalah gambar
                                        echo '<img src="' . base_url('./uploads/' . $file_path_undangan) . '" alt="file_path_undangan" width="100">';
                                    } elseif ($file_extension === 'pdf') {
                                        // Jika file adalah PDF
                                        echo '<embed src="' . base_url('./uploads/' . $file_path_undangan) . '" type="application/pdf" width="500" height="600" />';
                                    } elseif (!empty($file_path_undangan)) {
                                        // Jika file bukan gambar atau PDF
                                        echo '<a href="' . base_url('./uploads/' . $file_path_undangan) . '" target="_blank">' . $file_path_undangan . '</a>';
                                    } else {
                                        echo 'Not File';
                                    }
                                    ?>
                                </div>
                                <div class="mb-3">
                                    <label for="file_path_undangan" class="form-label">Edit Undangan</label>
                                    <input type="file" class="form-control" id="file_path_undangan" name="file_path_undangan" accept="">
                                    <small id="gambarHelp" class="form-text text-muted">Pilih file gambar baru (format: jpg, jpeg, png).</small>
                                </div>
                                <!-- END FILE PATH UNDANGAN -->


                                <!-- FILE PATH NOTULENSI -->
                                <div class="mb-3">
                                    <label for="file_path_notulensi" class="form-label">Photo Saat Ini</label><br>
                                    <?php
                                    $file_path_notulensi = $notulensi['file_path_notulensi'];
                                    $file_extension = pathinfo($file_path_notulensi, PATHINFO_EXTENSION);
                                    if (in_array($file_extension, ['jpg', 'jpeg', 'png', 'gif'])) {
                                        // Jika file adalah gambar
                                        echo '<img src="' . base_url('./uploads/' . $file_path_notulensi) . '" alt="file_path_notulensi" width="100">';
                                    } elseif ($file_extension === 'pdf') {
                                        // Jika file adalah PDF
                                        echo '<embed src="' . base_url('./uploads/' . $file_path_notulensi) . '" type="application/pdf" width="500" height="600" />';
                                    } elseif (!empty($file_path_notulensi)) {
                                        // Jika file bukan gambar atau PDF
                                        echo '<a href="' . base_url('./uploads/' . $file_path_notulensi) . '" target="_blank">' . $file_path_notulensi . '</a>';
                                    } else {
                                        echo 'Not File';
                                    }
                                    ?>
                                </div>
                                <div class="mb-3">
                                    <label for="file_path_notulensi" class="form-label">Edit Photo</label>
                                    <input type="file" class="form-control" id="file_path_notulensi" name="file_path_notulensi" accept="">
                                    <small id="gambarHelp" class="form-text text-muted">Pilih file gambar baru (format: jpg, jpeg, png).</small>
                                </div>
                                <!-- END FILE PHOTO -->

                                <button type="submit" class="btn btn-primary btn-sm">Simpan Perubahan</button>
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