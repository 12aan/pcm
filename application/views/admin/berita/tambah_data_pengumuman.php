<!-- Begin Page Content -->
<div class="container-fluid">


    <body>
        <script src="<?php echo base_url('assets/static/js/initTheme.js') ?>"></script>




        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Data Pengumuman</h4>
                </div>
                <div class="card-body">
                    <form enctype="multipart/form-data" action="<?php echo site_url('breaking_news/tambah_data_braking_news'); ?>" method="post">
                        <div class="mb-3">
                            <label for="judul_berita" class="form-label">Judul Berita</label>
                            <input type="text" class="form-control" id="judul_berita" name="judul_berita" required>
                        </div>

                        <div class="mb-3">
                            <label for="isi_berita" class="form-label">Isi Berita</label>
                            <textarea id='editor1' class='form-control' name='isi_content' style='height:1000px' required></textarea>
                            <!-- <input type="text" class="form-control" id="isi_berita" name="isi_berita" required> -->
                        </div>
                        <div class="mb-3">
                            <label for="avatar" class="form-label">Upload Berkas</label>
                            <input type="file" class="form-control" id="avatar" name="avatar">
                            <small id="gambarHelp" class="form-text text-muted">Pilih file (format: jpg, jpeg, png, pdf, dll).</small>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Unggah Berkas</button>
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


    </body>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->