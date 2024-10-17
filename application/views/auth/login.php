<div class="page page-center">
    <div class="container container-normal py-4 mt-6">
        <h1>Hai..! <BR></BR>
            Selamat Datang</h1>
        <div class="row align-items-center g-4">
            <div class="col-lg d-none d-lg-block">
                <img src="<?php echo base_url('./tabler/static/illustrations/undraw_secure_login_pdn4.svg') ?>" height="300" class="d-block mx-auto" alt="">
            </div>
            <div class="col-lg">
                <div class="container">
                    <div class="card card-md rounded-5 shadow-sm">
                        <div class="card-body p-0">
                            <!-- Banner -->
                            <div class="text-center mb-0 p-3" style="border-bottom: 2px solid #000;">
                                <a href="." class="navbar-brand navbar-brand-autodark">
                                    <img src="<?php echo base_url('/tabler/static/BANNER-removebg-preview.png') ?>" height="50" alt="">
                                </a>
                            </div>
                            <!-- Card Login -->
                            <div class="p-4">
                                <h2 class="h2 text-center mb-4">Sign In</h2>
                                <?= $this->session->flashdata('message'); ?>
                                <form class="user" method="post" action="<?php echo site_url('auth'); ?>" autocomplete="off" novalidate>
                                    <div class="mb-3">
                                        <label class="form-label">Email address</label>
                                        <input type="text" id="email" name="email" class="form-control" value="<?= set_value('email'); ?>" placeholder="Enter Email Address..." autocomplete="off">
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label">Password</label>
                                        <div class="input-group input-group-flat">
                                            <input type="password" id="password" name="password" class="form-control" placeholder="Your password" autocomplete="off">
                                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                            <span class="input-group-text">
                                                <a href="#" id="togglePassword" class="link-secondary" title="Show password" data-bs-toggle="tooltip">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                        <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                                    </svg>
                                                </a>
                                            </span>
                                        </div>
                                    </div>

                                    <script>
                                        const togglePassword = document.querySelector('#togglePassword');
                                        const passwordInput = document.querySelector('#password');

                                        togglePassword.addEventListener('click', function(e) {
                                            e.preventDefault();
                                            // Toggle the type attribute
                                            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                                            passwordInput.setAttribute('type', type);
                                            // Toggle the title
                                            this.setAttribute('title', type === 'password' ? 'Show password' : 'Hide password');
                                        });
                                    </script>

                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-primary w-100 rounded-3">Login</button>
                                    </div>
                                </form>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('auth/forgotpassword'); ?>"></a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('auth/registration'); ?>"></a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>