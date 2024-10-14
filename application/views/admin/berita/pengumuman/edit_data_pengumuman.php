<!-- Begin Page Content -->
<div class="container-fluid">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Data Pengumuman</h4>
                </div>
                <div class="card-body">
                    <form action="<?php echo site_url('berita/edit_data_pengumuman/' . $pengumuman['id_pengumuman']); ?>" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="judul_berita" class="form-label">Judul Berita</label>
                            <input type="text" class="form-control" id="judul_berita" name="judul_berita" value="<?php echo isset($pengumuman['judul_berita']) ? $pengumuman['judul_berita'] : ''; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="isi_content" class="form-label">Isi Berita</label>
                            <textarea id='editor1' class='form-control' name='isi_content' style='height:1000px' required><?php echo isset($pengumuman['isi_content']) ? $pengumuman['isi_content'] : ''; ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="avatar" class="form-label">Avatar Saat Ini</label><br>
                            <?php
                            $avatar = $pengumuman['avatar'];
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

        <script>
            CKEDITOR.replace('editor1', {
                filebrowserImageBrowseUrl: '<?php echo base_url('assets/kcfinder'); ?>'
            });
        </script>
        <script src="<?php echo base_url('/assets/static/js/components/dark.js') ?>"></script>
        <script src="<?php echo base_url('/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') ?>"></script>

        <script src="<?php echo base_url('/assets/compiled/js/app.js') ?>"></script>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->