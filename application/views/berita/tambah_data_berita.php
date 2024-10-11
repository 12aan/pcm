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
                                    <li class="breadcrumb-item active" aria-current="page"> Tambah data berita</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tambah Data Berita</h4>
                        </div>
                        <div class="card-body">
                            <form enctype="multipart/form-data" action="<?php echo site_url('berita/tambah_data_berita'); ?>" method="post">
                                <div class="mb-3">
                                    <label for="judul_berita" class="form-label">Judul Berita</label>
                                    <input type="text" class="form-control" id="judul_berita" name="judul_berita" required>
                                </div>

                                <tr>
                                    <th scope='row'>Isi Halaman</th>
                                    <td><textarea id='editor1' class='form-control' name='b'></textarea></td>
                                </tr>

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
            </div>
        </div>
    </div>
    <script src="   "></script>
    <script src="<?php echo base_url('/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') ?>"></script>

    <script src="<?php echo base_url('/assets/compiled/js/app.js') ?>"></script>

    <script>
        CKEDITOR.replace('editor1', {
            filebrowserImageBrowseUrl: '<?php echo base_url('assets/kcfinder'); ?>'
        });
    </script>
</body>

</html>