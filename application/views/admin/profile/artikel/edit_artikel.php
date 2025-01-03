<!-- Begin Page Content -->
<div class="container-fluid">

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Kajian Hadist</h4>
            </div>
            <div class="card-body">
                <form enctype="multipart/form-data" action="<?php echo site_url('profile/edit_artikel/' . $artikel['id_artikel']); ?>" method="post">
                    <div class="mb-3">
                        <label for="judul_artikel" class="form-label">Judul </label>
                        <input type="text" class="form-control" id="judul_artikel" name="judul_artikel" value="<?= $artikel['judul_artikel']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="isi_artikel" class="form-label">Isi Kajian</label>
                        <textarea id='editor1' class='form-control' name='isi_artikel' style='height:1000px' required><?= $artikel['isi_artikel']; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Edit Data</button>
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