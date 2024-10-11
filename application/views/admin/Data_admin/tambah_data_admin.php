<!-- Begin Page Content -->
<div class="container-fluid">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4>Registrasi Admin</h4>
            </div>
            <div class="card-body">
                <!-- Flashdata for errors -->
                <?php if ($this->session->flashdata('error')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>
                <?php endif; ?>

                <!-- Form for admin registration -->
                <form action="<?= site_url('admin/tambah_data_admin') ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img id="previewImage" src="<?= base_url('assets12/img/profile/default.jpg') ?>" class="img-thumbnail">
                                </div>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image" onchange="previewImage(event)">
                                        <label class="custom-file-label" for="image">Choose file Image</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        function previewImage(event) {
                            const image = document.getElementById('previewImage');
                            image.src = URL.createObjectURL(event.target.files[0]);
                        }
                    </script>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                    </div>

                    <div class="mb-3">
                        <label for="role_admin" class="form-label">Role Admin</label>
                        <select class="form-control" id="role_admin" name="role_admin" required>
                            <option value="">Pilih Role</option>
                            <?php foreach ($roles as $role): ?>
                                <option value="<?= $role['id']; ?>"><?= $role['role']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" checked>
                        <label class="form-check-label" for="is_active">Aktif</label>
                    </div>

                    <button type="submit" class="btn btn-primary">Daftar</button>
                </form>
            </div>
        </div>
    </section>
</div>

<!-- /.container-fluid -->


</div>
<!-- End of Main Content -->