<!-- Begin Page Content -->
<div class="container-fluid">

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Surat Keputusan</h4>
            </div>
            <div class="card-body">
                <form action="<?php echo site_url('adminor/edit_data_keputusan/' . $surat_keputusan['id_keputusan']); ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="agenda" class="form-label">Agenda</label>
                        <input type="text" class="form-control" id="agenda" name="agenda" value="<?php echo isset($surat_keputusan['agenda']) ? $surat_keputusan['agenda'] : ''; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="nama_surat" class="form-label">Nama Surat</label>
                        <input type="text" class="form-control" id="nama_surat" name="nama_surat" value="<?php echo isset($surat_keputusan['nama_surat']) ? $surat_keputusan['nama_surat'] : ''; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="gambarBerita" class="form-label">Avatar Saat Ini</label><br>
                        <?php
                        $file_path = $surat_keputusan['file_path'];
                        $file_extension = pathinfo($file_path, PATHINFO_EXTENSION);
                        if (in_array($file_extension, ['jpg', 'jpeg', 'png', 'gif'])) {
                            // Jika file adalah gambar
                            echo '<img src="' . base_url('./uploads/' . $file_path) . '" alt="file_path" width="100">';
                        } elseif ($file_extension === 'pdf') {
                            // Jika file adalah PDF
                            echo '<embed src="' . base_url('./uploads/' . $file_path) . '" type="application/pdf" width="500" height="600" />';
                        } elseif (!empty($file_path)) {
                            // Jika file bukan gambar atau PDF
                            echo '<a href="' . base_url('./uploads/' . $file_path) . '" target="_blank">' . $file_path . '</a>';
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

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->