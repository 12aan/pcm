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
                            <h4>Registrasi Admin</h4>
                        </div>
                        <div class="card-body">
                            <?php if ($this->session->flashdata('error')) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $this->session->flashdata('error'); ?>
                                </div>
                            <?php endif; ?>

                            <form action="<?php echo site_url('admin/tambah_admin') ?>" method="post" enctype="multipart/form-data">
                                <?php if (isset($error) && !empty($error)) : ?>
                                    <div class="alert alert-danger"><?php echo $error; ?></div>
                                <?php endif; ?>
                                <div class="mb-3">
                                    <label for="nama_admin" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama_admin" name="nama_admin" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nomorhp" class="form-label">Nomor HP</label>
                                    <input type="tel" class="form-control" id="nomorhp" name="no_hp" pattern="[0-9]{10,14}" placeholder="Contoh: 081234567890" required>
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="password" name="password" required>
                                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                            <i class="bi bi-eye-slash" id="toggleIcon"></i>
                                        </button>
                                    </div>
                                </div>

                                <script>
                                    const togglePassword = document.querySelector('#togglePassword');
                                    const password = document.querySelector('#password');
                                    const toggleIcon = document.querySelector('#toggleIcon');

                                    togglePassword.addEventListener('click', function(e) {
                                        // toggle the type attribute
                                        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                                        password.setAttribute('type', type);

                                        // toggle the eye slash icon
                                        if (type === 'password') {
                                            toggleIcon.classList.remove('bi-eye');
                                            toggleIcon.classList.add('bi-eye-slash');
                                        } else {
                                            toggleIcon.classList.remove('bi-eye-slash');
                                            toggleIcon.classList.add('bi-eye');
                                        }
                                    });
                                </script>

                                <div class="mb-3">
                                    <label for="konfirmasiPassword" class="form-label">Konfirmasi Password</label>
                                    <input type="password" class="form-control" id="konfirmasiPassword" name="konfirmasiPassword" required>
                                </div>
                                <div class="mb-3">
                                    <label for="gambar" class="form-label">Upload Profile</label>
                                    <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*" required>
                                    <small id="gambarHelp" class="form-text text-muted">Pilih file gambar (format: jpg, jpeg, png).</small>
                                </div>
                                <button type="submit" class="btn btn-primary">Daftar</button>
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