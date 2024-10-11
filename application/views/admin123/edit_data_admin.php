<!DOCTYPE html>
<html lang="en">



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
                                    <li class="breadcrumb-item active" aria-current="page">Layout Default</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <h4>EDIT DATA ADMIN</h4>
                        </div>
                        <div class="card-body">
                            <!-- Tampilan edit_data_admin.php -->
                            <form action="<?php echo site_url('admin/edit_data_admin/' . $admin['id_admin']); ?>" method="post" enctype="multipart/form-data">
                                <?php if ($this->session->flashdata('error')) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $this->session->flashdata('error'); ?>
                                    </div>
                                <?php endif; ?>
                                <div class="mb-3">
                                    <label for="nama_admin" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama_admin" name="nama_admin" value="<?php echo $admin['nama_admin']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $admin['tanggal_lahir']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $admin['alamat']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $admin['email']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="nomorhp" class="form-label">Nomor HP</label>
                                    <input type="tel" class="form-control" id="nomorhp" name="no_hp" pattern="[0-9]{10,14}" placeholder="Contoh: 081234567890" value="<?php echo $admin['no_hp']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $admin['username']; ?>">
                                </div>
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
                                    <label for="gambar" class="form-label">Upload Profile Baru</label>
                                    <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
                                    <small id="gambarHelp" class="form-text text-muted">Pilih file gambar (format: jpg, jpeg, png).</small>
                                    <input type="hidden" id="gantiAvatar" name="gantiAvatar">
                                </div>

                                <div>
                                    <button type="submit" name="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </div>

                            </form>

                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
    <script src="<?php echo base_url('assets/static/js/components/dark.js') ?>"></script>
    <script src="<?php echo base_url('assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') ?>"></script>


    <script src="<?php echo base_url('assets/compiled/js/app.js') ?>"></script>



</body>

</html>