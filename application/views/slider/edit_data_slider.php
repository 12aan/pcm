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
                                    <li class="breadcrumb-item active" aria-current="page"> Edit data slider</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Data Slider</h4>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo site_url('slider/edit_data_slider/' . $slider['id_slider']); ?>" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="judul_berita" class="form-label">Judul Berita</label>
                                    <input type="text" class="form-control" id="judul_berita" name="judul_berita" value="<?php echo isset($slider['judul_berita']) ? $slider['judul_berita'] : ''; ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="isi_content" class="form-label">Isi Berita</label>
                                    <input type="text" class="form-control" id="isi_content" name="isi_content" value="<?php echo isset($slider['isi_content']) ? $slider['isi_content'] : ''; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="avatar" class="form-label">Avatar Saat Ini</label><br>
                                    <?php
                                    $avatar = $slider['avatar'];
                                    $file_extension = pathinfo($avatar, PATHINFO_EXTENSION);
                                    if (in_array($file_extension, ['jpg', 'jpeg', 'png', 'gif'])) {
                                        // Jika file adalah gambar
                                        echo '<img src="' . base_url('./uploads/' . $avatar) . '" alt="avatar" width="100">';
                                    } elseif ($file_extension === 'pdf') {
                                        // Jika file adalah PDF
                                        echo '<embed src="' . base_url('./uploads/' . $avatar) . '" type="application/pdf" width="500" height="600" />';
                                    } elseif (!empty($avatar)) {
                                        // Jika file bukan gambar atau PDF dan tidak kosong
                                        echo '<a href="' . base_url('./uploads/' . $avatar) . '" target="_blank">' . $avatar . '</a>';
                                    } else {
                                        // Jika tidak ada file yang sesuai
                                        echo 'No file';
                                    }
                                    ?>
                                </div>


                                <div class="mb-3">
                                    <label for="avatar" class="form-label">Edit Gambar lain</label>
                                    <input type="file" class="form-control" id="avatar" name="avatar" accept="">
                                    <small id="gambarHelp" class="form-text text-muted">Pilih file gambar baru (format: jpg, jpeg, png).</small>
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm">Edit Surat Masuk</button>
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