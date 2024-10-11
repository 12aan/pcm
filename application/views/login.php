<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Sign</title>
    <!-- CSS files -->
    <link href="<?php echo base_url('./assets/dist/css/tabler.min.css?1684106062') ?>" rel="stylesheet" />
    <link href="<?php echo base_url('./assets/dist/css/tabler-flags.min.css?1684106062') ?>" rel="stylesheet" />
    <link href="<?php echo base_url('./assets/dist/css/tabler-payments.min.css?1684106062') ?>" rel="stylesheet" />
    <link href="<?php echo base_url('./assets/dist/css/tabler-vendors.min.css?1684106062') ?>" rel="stylesheet" />
    <link href="<?php echo base_url('./assets/dist/css/demo.min.css?1684106062') ?>" rel="stylesheet" />
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
</head>

<body class="d-flex flex-column">
    <script src="<?php echo base_url('./assets/dist/js/demo-theme.min.js?1684106062') ?>"></script>
    <div class="page page-center">
        <div class="container container-normal py-4">
            <div class="row align-items-center g-4">
                <div class="col-lg d-none d-lg-block">
                    <img src="<?php echo base_url('./tabler/static/illustrations/undraw_secure_login_pdn4.svg') ?>" height="300" class="d-block mx-auto" alt="">
                </div>
                <div class="col-lg">
                    <div class="container-tight">
                        <div class="text-center mb-4">
                            <a href="." class="navbar-brand navbar-brand-autodark"><img src="<?php echo base_url('/tabler/static/BANNER-removebg-preview.png') ?> " height="50" alt=""></a>
                        </div>
                        <div class="card card-md">
                            <div class="card-body">
                                <h2 class="h2 text-center mb-4">Login to your account</h2>
                                <form class="user" method="post" action="<?php echo site_url('auth/login'); ?>" method="post" autocomplete="off" novalidate>
                                    <?php
                                    // Tampilkan notifikasi jika ada
                                    if ($this->session->flashdata('error')) {
                                        echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
                                    }
                                    ?>

                                    <div class="mb-3">
                                        <label class="form-label">Email address</label>
                                        <input type="text" id="identity" name="identity" class="form-control" placeholder="your@email.com" autocomplete="off">
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label">
                                            Password
                                        </label>
                                        <div class="input-group input-group-flat">
                                            <input type="password" id="password" name="password" class="form-control" placeholder="Your password" autocomplete="off">
                                            <span class="input-group-text">
                                                <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                        <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                                    </svg>
                                                </a>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-primary w-100">Sign in</button>
                                    </div>
                                </form>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="<?php echo base_url('./assets/dist/js/tabler.min.js?1684106062') ?>" defer></script>
    <script src="<?php echo base_url('./assets/dist/js/demo.min.js?1684106062') ?>" defer></script>
</body>

</html>