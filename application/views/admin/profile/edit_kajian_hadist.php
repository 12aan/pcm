<!-- Begin Page Content -->
<div class="container-fluid">

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Kajian Hadist</h4>
            </div>
            <div class="card-body">
                <form enctype="multipart/form-data" action="<?php echo site_url('profile/edit_kajian_hadist'); ?>" method="post">
                    <div class="mb-3">
                        <label for="judul_kajian" class="form-label">Judul </label>
                        <input type="text" class="form-control" id="judul_kajian" name="judul_kajian" required>
                    </div>

                    <div class="mb-3">
                        <label for="isi_kajian" class="form-label">Isi Kajian</label>
                        <textarea id='editor1' class='form-control' name='isi_kajian' style='height:1000px' required></textarea>
                        <!-- <input type="text" class="form-control" id="isi_kajian" name="isi_kajian" required> -->
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="<?= base_url('assets12/img/profile/dokumen.jpg'); ?>" class="img-thumbnail">
                                </div>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="avatar" name="avatar">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
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

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->