<!-- Begin Page Content -->
<div class="container-fluid">


    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4>EDIT DATA ADMIN</h4>
            </div>
            <div class="card-body">
                <!-- Tampilan edit_data_admin.php -->
                <form action="<?= site_url('admin/edit_data_admin/' . $admin['id']) ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= $admin['name']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $admin['email']; ?>" required>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="<?= base_url('assets12/img/profile/') . ($admin['image'] ? $admin['image'] : 'default.jpg'); ?>" class="img-thumbnail">
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


                    <!-- Input select tambahan -->
                    <div class="mb-3">
                        <label for="gantiPasswordCheckbox" class="form-label">Apakah Anda ingin mengganti password?</label>
                        <div class="form-check" id="gantiPassword" name="gantiPassword">
                            <input class="form-check-input" type="checkbox" id="gantiPasswordCheckbox" name="gantiPassword" value="1">
                            <label class="form-check-label" for="gantiPasswordCheckbox">Ya</label>
                        </div>
                    </div>

                    <div id="passwordFields" style="display: none;">
                        <div class="mb-3">
                            <label for="password" class="form-label">Password Baru</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password">
                                <button class="btn btn-outline-secondary" type="button" id="togglePassword">👁️</button>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="konfirmasiPassword" class="form-label">Konfirmasi Password Baru</label>
                            <input type="password" class="form-control" id="konfirmasiPassword" name="konfirmasiPassword">
                        </div>
                    </div>

                    <script>
                        document.getElementById('gantiPasswordCheckbox').addEventListener('change', function() {
                            var passwordFields = document.getElementById('passwordFields');
                            if (this.checked) {
                                passwordFields.style.display = 'block';
                            } else {
                                passwordFields.style.display = 'none';
                            }
                        });

                        document.getElementById('togglePassword').addEventListener('click', function() {
                            var passwordInput = document.getElementById('password');
                            if (passwordInput.type === 'password') {
                                passwordInput.type = 'text';
                                this.textContent = '👁️️';
                            } else {
                                passwordInput.type = 'password';
                                this.textContent = '👁️';
                            }
                        });
                    </script>


                    <div class="mb-3">
                        <label for="role_admin" class="form-label">Role Admin</label>
                        <select class="form-control" id="role_admin" name="role_admin" required>
                            <option value="">Pilih Role</option>
                            <?php foreach ($roles as $role): ?>
                                <option value="<?= $role['id']; ?>" <?= $role['id'] == $admin['role_id'] ? 'selected' : ''; ?>>
                                    <?= $role['role']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>


                    <!-- Status Aktif sebagai checkbox -->
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" <?php echo ($admin['is_active'] == 1) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="is_active">Aktif</label>
                    </div>


                    <div>
                        <button type="submit" name="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>

                </form>

            </div>
        </div>
    </section>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->