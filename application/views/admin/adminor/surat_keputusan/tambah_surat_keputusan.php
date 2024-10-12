<!-- Begin Page Content -->
<div class="container-fluid">

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tambah Surat Keputusan</h4>
            </div>
            <div class="card-body">
                <form enctype="multipart/form-data" action="<?php echo site_url('adminor/tambah_surat_keputusan_agenda'); ?>" method="post">
                    <div class="mb-3">
                        <label for="agenda" class="form-label">Agenda</label>
                        <!-- Menampilkan dropdown untuk memilih agenda -->
                        <select class="form-control" id="agenda" name="agenda" required>
                            <option value="">Pilih Agenda</option>

                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="nama_surat" class="form-label">Nama Surat</label>
                        <input type="text" class="form-control" id="nama_surat" name="nama_surat" required>
                    </div>
                    <h6 class="card-title">Upload Berkas</h6>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="<?= base_url('assets12/img/profile/dokumen.jpg'); ?>" class="img-thumbnail">
                                </div>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image">
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


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->