<!-- Begin Page Content -->
<div class="container-fluid">

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Surat Keluar</h4>
            </div>
            <div class="card-body">
                <form action="<?php echo site_url('adminor/edit_data_keluar/' . $surat_keluar['id_keluar']); ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="agenda" class="form-label">Agenda</label>
                        <input type="text" class="form-control" id="agenda" name="agenda" value="<?php echo isset($surat_keluar['agenda']) ? $surat_keluar['agenda'] : ''; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="nama_surat" class="form-label">Nama Surat</label>
                        <input type="text" class="form-control" id="nama_surat" name="nama_surat" value="<?php echo isset($surat_keluar['nama_surat']) ? $surat_keluar['nama_surat'] : ''; ?>" required>
                    </div>

                    <!-- FILE SURAT -->
                    <div class="mb-3">
                        <label for="file_path_surat" class="form-label">Surat Saat Ini</label><br>
                        <?php
                        $file_path_surat = $surat_keluar['file_path_surat'];
                        $file_extension = pathinfo($file_path_surat, PATHINFO_EXTENSION);
                        if (in_array($file_extension, ['jpg', 'jpeg', 'png', 'gif'])) {
                            // Jika file adalah gambar
                            echo '<img src="' . base_url('./uploads/' . $file_path_surat) . '" alt="file_path_surat" width="100">';
                        } elseif ($file_extension === 'pdf') {
                            // Jika file adalah PDF
                            echo '<embed src="' . base_url('./uploads/' . $file_path_surat) . '" type="application/pdf" width="500" height="600" />';
                        } elseif (!empty($file_path_surat)) {
                            // Jika file bukan gambar atau PDF
                            echo '<a href="' . base_url('./uploads/' . $file_path_surat) . '" target="_blank">' . $file_path_surat . '</a>';
                        } else {
                            echo 'Not File';
                        }
                        ?>
                    </div>
                    <div class="mb-3">
                        <label for="file_path_surat" class="form-label">Edit Surat</label>
                        <input type="file" class="form-control" id="file_path_surat" name="file_path_surat" accept="">
                        <small id="gambarHelp" class="form-text text-muted">Pilih file gambar baru (format: jpg, jpeg, png).</small>
                    </div>
                    <!-- END FILE SURT -->



                    <!-- FILE PATH UNDANGAN -->
                    <div class="mb-3">
                        <label for="file_path_undangan" class="form-label">Undangan saat ini</label><br>
                        <?php
                        $file_path_undangan = $surat_keluar['file_path_undangan'];
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


                    <!-- FILE PATH PHOTO -->
                    <div class="mb-3">
                        <label for="file_path_photo" class="form-label">Photo Saat Ini</label><br>
                        <?php
                        $file_path_photo = $surat_keluar['file_path_photo'];
                        $file_extension = pathinfo($file_path_photo, PATHINFO_EXTENSION);
                        if (in_array($file_extension, ['jpg', 'jpeg', 'png', 'gif'])) {
                            // Jika file adalah gambar
                            echo '<img src="' . base_url('./uploads/' . $file_path_photo) . '" alt="file_path_photo" width="100">';
                        } elseif ($file_extension === 'pdf') {
                            // Jika file adalah PDF
                            echo '<embed src="' . base_url('./uploads/' . $file_path_photo) . '" type="application/pdf" width="500" height="600" />';
                        } elseif (!empty($file_path_photo)) {
                            // Jika file bukan gambar atau PDF
                            echo '<a href="' . base_url('./uploads/' . $file_path_photo) . '" target="_blank">' . $file_path_photo . '</a>';
                        } else {
                            echo 'Not File';
                        }
                        ?>
                    </div>
                    <div class="mb-3">
                        <label for="file_path_photo" class="form-label">Edit Photo</label>
                        <input type="file" class="form-control" id="file_path_photo" name="file_path_photo" accept="">
                        <small id="gambarHelp" class="form-text text-muted">Pilih file gambar baru (format: jpg, jpeg, png).</small>
                    </div>
                    <!-- END FILE PHOTO -->

                    <button type="submit" class="btn btn-primary btn-sm">Edit Surat Masuk</button>
                </form>
            </div>
        </div>
    </section>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->