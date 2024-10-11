<!-- Begin Page Content -->
<div class="container-fluid">

    <body>
        <script src="<?php echo base_url('assets/static/js/initTheme.js') ?>"></script>


        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Data Slider</h4>
                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="judul_berita" class="form-label">Judul Berita</label>
                            <input type="text" class="form-control" id="judul_berita" name="judul_berita" value="" required>
                        </div>

                        <div class="mb-3">
                            <label for="isi_berita" class="form-label">Isi Berita</label>
                            <textarea id='editor1' class='form-control' name='isi_berita' style='height:1000px' required></textarea>

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


    </body>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->