<!-- Begin Page Content -->
<div class="container-fluid">

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Data Berita</h4>
            </div>
            <div class="card-body">
                <form enctype="multipart/form-data" action="<?php echo site_url('konten/edit_data_konten/' . $konten['id_konten']); ?>" method="post">

                    <!-- Pilihan Kategori -->
                    <div class="mb-3">
                        <label for="kategori_berita" class="form-label">Kategori Berita</label>
                        <select class="form-control" id="kategori_berita" name="id_kategori" required>
                            <option value="">Pilih Kategori</option>
                            <?php foreach ($kategori as $kat): ?>
                                <option value="<?= $kat->id_kategori ?>" <?= ($kat->id_kategori == $konten['id_kategori']) ? 'selected' : '' ?>>
                                    <?= $kat->nama_kategori ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" value="<?= $konten['judul'] ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="isi_pesan" class="form-label">Isi Berita</label>
                        <textarea id="editor1" class="form-control" name="isi_pesan" style="height:1000px" required><?= $konten['isi_pesan'] ?></textarea>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-3">
                                    <?php if (!empty($konten['gambar'])) : ?>
                                        <img src="<?= base_url('uploads/' . $konten['gambar']); ?>" class="img-thumbnail" alt="Gambar Konten">
                                    <?php else : ?>
                                        <img src="<?= base_url('assets12/img/profile/dokumen.jpg'); ?>" class="img-thumbnail" alt="Tidak ada Gambar">
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                        <label class="custom-file-label" for="gambar">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-sm">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </section>

    <script>
        CKEDITOR.replace('editor1', {
            filebrowserImageBrowseUrl: '<?php echo base_url('assets/kcfinder'); ?>',
            filebrowserUploadUrl: '<?php echo base_url('assets/kcfinder'); ?>',
            filebrowserImageUploadUrl: '<?php echo base_url('assets/kcfinder/upload.php?type=images'); ?>'
        });
    </script>

    <script src="<?php echo base_url('/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') ?>"></script>
    <script src="<?php echo base_url('/assets/compiled/js/app.js') ?>"></script>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->