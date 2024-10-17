<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <form enctype="multipart/form-data" action="<?= site_url('profile/proses_edit/' . $profile['id_profile']); ?>" method="post">
        <div class="mb-3">
            <label for="tahun_jabatan" class="form-label">Tahun Jabatan</label>
            <input type="text" class="form-control" id="tahun_jabatan" name="tahun_jabatan" value="<?= $profile['tahun_jabatan']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="nama_pejabat" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama_pejabat" name="nama_pejabat" value="<?= $profile['nama_pejabat']; ?>" required>
        </div>

        <h6 class="card-title">Upload Foto</h6>
        <div class="form-group row">
            <div class="col-sm-10">
                <div class="row">
                    <div class="col-sm-3">
                        <img src="<?= base_url('./uploads/' . $profile['avatar']); ?>" class="img-thumbnail">
                    </div>
                    <div class="col-sm-9">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="avatar" name="avatar">
                            <label class="custom-file-label" for="avatar">Pilih file gambar</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Perbarui Data</button>
    </form>
</div>


</div>