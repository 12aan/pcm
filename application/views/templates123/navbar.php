<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Home</title>
    <!-- CSS files -->
    <link href="<?php echo base_url('/tabler/dist/css/tabler.min.css?1684106062') ?>" rel="stylesheet" />
    <link href="<?php echo base_url('/tabler/dist/css/tabler-flags.min.css?1684106062') ?>" rel="stylesheet" />
    <link href="<?php echo base_url('/tabler/dist/css/tabler-payments.min.css?1684106062') ?>" rel="stylesheet" />
    <link href="<?php echo base_url('/tabler/dist/css/tabler-vendors.min.css?1684106062') ?>" rel="stylesheet" />
    <link href="<?php echo base_url('/tabler/dist/css/demo.min.css?1684106062') ?>" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+zr/5qDI3h2mloR+e63i2K0p5fYYuKDI8oWIwag" crossorigin="anonymous">

    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }

        .text-justify {
            text-align: justify;
        }

        .list-group-item::before {
            content: counter(list-item) ". ";
            counter-increment: list-item;
        }

        ::placeholder {
            font-style: italic;
        }

        .latepost-container {
            position: sticky;
            top: 180px;
            /* Sesuaikan dengan posisi yang diinginkan */
            z-index: 1000;
            /* Pastikan nilai z-index lebih tinggi dari elemen lain */
        }
    </style>
</head>

<body>
    <script src="<?php echo base_url('/tabler/dist/js/demo-theme.min.js?1684106062') ?>"></script>

    <div class="page d-flex">
        <div class="sticky-top">
            <!-- Navbar -->
            <header class="navbar navbar-expand-md sticky-top d-print-none">
                <div class="container-xl">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <h1 class="navbar-brand pe-0 pe-md-1 me-8 mt-0">
                        <a href=".">
                            <img src="<?php echo base_url('/tabler/static/BANNER-removebg-preview.png') ?>" width="180" height="60" alt="Tabler" class="navbar-brand">
                        </a>
                    </h1>
                    <div class="collapse navbar-collapse justify-content-end" id="navbar-menu">
                        <div class="d-none d-md-flex m-2">
                            <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
                                <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
                                </svg>
                            </a>
                            <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
                                <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                    <path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
                                </svg>
                            </a>

                        </div>
                        <div class="d-flex align-items-center">
                            <!-- Facebook Icon -->
                            <a href="https://www.facebook.com/pcmkasihanistimewa" class="btn btn-facebook btn-icon me-2" aria-label="Facebook">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="20" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
                                </svg>
                            </a>
                            <!-- Instagram Icon -->
                            <a href="https://www.instagram.com/pcmkasihan?igsh=amd1dGJubjVxdW1x" class="btn btn-instagram btn-icon me-2" aria-label="Instagram">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M4 4m0 4a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z" />
                                    <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                    <path d="M16.5 7.5l0 .01" />
                                </svg>
                            </a>
                            <!-- Youtube Icon -->
                            <a href="https://youtube.com/@pcmkasihan3579?si=JujUaQFI_yi4YASJ" class="btn btn-youtube btn-icon me-2" aria-label="Youtube">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M3 5m0 4a4 4 0 0 1 4 -4h10a4 4 0 0 1 4 4v6a4 4 0 0 1 -4 4h-10a4 4 0 0 1 -4 -4z" />
                                    <path d="M10 9l5 3l-5 3z" />
                                </svg>
                            </a>
                            <!-- Twitter Icon -->
                            <a href="https://x.com/pcm_kasihan?t=7oib8ankMs8jMJvr6tBfCw&s=09" class="btn btn-twitter btn-icon" aria-label="Twitter">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c0 -.249 1.51 -2.772 1.818 -4.013z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </header>

            <header class="navbar-expand-md">
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <div class="navbar">
                        <div class="container-xl">
                            <ul class="navbar-nav">

                                <?php
                                // Ambil halaman saat ini dari URL
                                $current_page = basename($_SERVER['REQUEST_URI']);

                                // Fungsi untuk menandai tautan aktif
                                function is_active($page_names, $current_page)
                                {
                                    // Periksa apakah $page_names merupakan array
                                    if (!is_array($page_names)) {
                                        $page_names = array($page_names);
                                    }

                                    // Periksa apakah halaman saat ini cocok dengan salah satu dari $page_names
                                    foreach ($page_names as $page_name) {
                                        if ($page_name == $current_page) {
                                            return true;
                                        }
                                    }

                                    // Periksa apakah tautan submenu dropdown juga cocok dengan halaman saat ini
                                    foreach ($page_names as $page_name) {
                                        if (strpos($current_page, $page_name) !== false) {
                                            return true;
                                        }
                                    }

                                    return false;
                                }
                                ?>

                                <li class="nav-item <?php if (is_active('home', $current_page)) echo 'active'; ?>">
                                    <a class="nav-link" href="<?php echo base_url('home') ?>">
                                        <span class="nav-link-title">
                                            Home
                                        </span>
                                    </a>
                                </li>

                                <li class="nav-item dropdown <?php if (is_active('profile', $current_page)) echo 'active'; ?>">
                                    <a class="nav-link" href="<?= base_url(); ?>Home/profile" role="button" aria-expanded="false">

                                        <span class="nav-link-title">
                                            Profil
                                        </span>
                                    </a>
                                </li>

                                <li class="nav-item <?php if (is_active('kajian', $current_page)) echo 'active'; ?>">
                                    <a class="nav-link" href="<?php echo base_url('home/kajian') ?>">

                                        <span class="nav-link-title">
                                            Kajian
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item dropdown <?php if (is_active(['amal_usaha_rumah', 'amal_usaha_masjid', 'amal_usaha_mushalla'], $current_page)) echo 'active'; ?>">
                                    <a class="nav-link dropdown-toggle" href="#navbar-extra" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                                        <span class="nav-link-title">
                                            Amal Usaha
                                        </span>
                                    </a>
                                    <div class="dropdown-menu">
                                        <div class="dropdown-menu-columns">
                                            <div class="dropdown-menu-column">
                                                <div class="dropend">
                                                    <a class="dropdown-item dropdown-toggle me-4" href="" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                                                        RUMAH YATIM & DHUAFA
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <a href="<?php echo base_url('home/amal_usaha_rumah') ?>" class="dropdown-item <?php if (is_active('amal_usaha_rumah', $current_page)) echo 'active'; ?>">
                                                            RUMAH YATIM & DHUAFA TIRTONIRMOLO TIMUR
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="dropend">
                                                    <a class="dropdown-item dropdown-toggle" href="#sidebar-error" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                                                        <!-- Download SVG icon from http://tabler-icons.io/i/file-minus -->
                                                        MASJID DAN MUSHALLA
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <a href="<?php echo base_url('home/amal_usaha_masjid') ?>" class="dropdown-item <?php if (is_active('amal_usaha_masjid', $current_page)) echo 'active'; ?>">
                                                            MASJID MUSYAWARAH TEGAL WANGI TAMANTIRTO
                                                        </a>
                                                        <a href="<?php echo base_url('home/amal_usaha_mushalla') ?>" class="dropdown-item <?php if (is_active('amal_usaha_mushalla', $current_page)) echo 'active'; ?>">
                                                            MASJID / MUSHALLA WAKAF MUHAMMADIYAH
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="nav-item dropdown <?php if (is_active(['prm_tirto_utara', 'prm_tirto_barat', 'prm_tirto_tengah', 'prm_tirto_timur', 'prm_tirto_selatan', 'prm_ngesti_utara', 'prm_ngesti_tengah', 'prm_ngesti_selatan', 'prm_bangunjiwo_barat', 'prm_bangunjiwo_timur', 'prm_tamantirto_utara', 'prm_tamantirto_selatan'], $current_page)) echo 'active'; ?>">
                                    <a class="nav-link dropdown-toggle" href="#navbar-layout" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                                        <span class="nav-link-title">
                                            PRM
                                        </span>
                                    </a>
                                    <div class="dropdown-menu">
                                        <div class="dropdown-menu-columns">
                                            <div class="dropdown-menu-column">
                                                <a class="dropdown-item <?php if (is_active('prm_tirto_utara', $current_page)) echo 'active'; ?>" href="<?php echo base_url('prm/prm_tirto_utara') ?>">
                                                    PRM TIRTONIRMOLO UTARA
                                                </a>
                                                <a class="dropdown-item <?php if (is_active('prm_tirto_barat', $current_page)) echo 'active'; ?>" href="<?php echo base_url('prm/prm_tirto_barat') ?>">
                                                    PRM TIRTONIRMOLO BARAT
                                                </a>
                                                <a class="dropdown-item <?php if (is_active('prm_tirto_tengah', $current_page)) echo 'active'; ?>" href="<?php echo base_url('prm/prm_tirto_tengah') ?>">
                                                    PRM TIRTONIRMOLO TENGAH
                                                </a>
                                                <a class="dropdown-item <?php if (is_active('prm_tirto_timur', $current_page)) echo 'active'; ?>" href="<?php echo base_url('prm/prm_tirto_timur') ?>">
                                                    PRM TIRTONIRMOLO TIMUR
                                                </a>
                                                <a class="dropdown-item <?php if (is_active('prm_tirto_selatan', $current_page)) echo 'active'; ?>" href="<?php echo base_url('prm/prm_tirto_selatan') ?>">
                                                    PRM TIRTONIRMOLO SELATAN
                                                </a>
                                                <a class="dropdown-item <?php if (is_active('prm_ngesti_utara', $current_page)) echo 'active'; ?>" href="<?php echo base_url('prm/prm_ngesti_utara') ?>">
                                                    PRM NGESTIHARJO UTARA
                                                </a>
                                                <a class="dropdown-item <?php if (is_active('prm_ngesti_tengah', $current_page)) echo 'active'; ?>" href="<?php echo base_url('prm/prm_ngesti_tengah') ?>">
                                                    PRM NGESTIHARJO TENGAH
                                                </a>
                                                <a class="dropdown-item <?php if (is_active('prm_ngesti_selatan', $current_page)) echo 'active'; ?>" href="<?php echo base_url('prm/prm_ngesti_selatan') ?>">
                                                    PRM NGESTIHARJO SELATAN
                                                </a>
                                                <a class="dropdown-item <?php if (is_active('prm_bangunjiwo_barat', $current_page)) echo 'active'; ?>" href="<?php echo base_url('prm/prm_bangunjiwo_barat') ?>">
                                                    PRM BANGUNJIWO BARAT
                                                </a>
                                                <a class="dropdown-item <?php if (is_active('prm_bangunjiwo_timur', $current_page)) echo 'active'; ?>" href="<?php echo base_url('prm/prm_bangunjiwo_timur') ?>">
                                                    PRM BANGUNJIWO TIMUR
                                                </a>
                                                <a class="dropdown-item <?php if (is_active('prm_tamantirto_utara', $current_page)) echo 'active'; ?>" href="<?php echo base_url('prm/prm_tamantirto_utara') ?>">
                                                    PRM TAMANTIRTO UTARA
                                                </a>
                                                <a class="dropdown-item <?php if (is_active('prm_tamantirto_selatan', $current_page)) echo 'active'; ?>" href="<?php echo base_url('prm/prm_tamantirto_selatan') ?>">
                                                    PRM TAMANTIRTO SELATAN
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="nav-item dropdown <?php if (is_active(['pimpinan_cabang_aisyah', 'pim_cab_pemuda_muhammadiyah', 'pim_cab_nasyiah', 'pim_cab_ipm', 'kokam_kec_kasihan', 'hw_kec_kasihan', 'ts_kec_kasihan'], $current_page)) echo 'active'; ?>">
                                    <a class="nav-link dropdown-toggle" href="#navbar-layout" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                                        <span class="nav-link-title">
                                            Ortom
                                        </span>
                                    </a>
                                    <div class="dropdown-menu">
                                        <div class="dropdown-menu-columns">
                                            <div class="dropdown-menu-column">
                                                <a class="dropdown-item <?php if (is_active('pimpinan_cabang_aisyah', $current_page)) echo 'active'; ?>" href="<?php echo base_url('ortom/pimpinan_cabang_aisyah') ?>">
                                                    PIMPINAN CABANG AISYIHAH
                                                </a>
                                                <a class="dropdown-item <?php if (is_active('pim_cab_pemuda_muhammadiyah', $current_page)) echo 'active'; ?>" href="<?php echo base_url('ortom/pim_cab_pemuda_muhammadiyah') ?>">
                                                    PIMPINAN CABANG PEMUDA MUHAMMADIYAH
                                                </a>
                                                <a class="dropdown-item <?php if (is_active('pim_cab_nasyiah', $current_page)) echo 'active'; ?>" href="<?php echo base_url('ortom/pim_cab_nasyiah') ?>">
                                                    PIMPINAN CABANG NASIYAH
                                                </a>
                                                <a class="dropdown-item <?php if (is_active('pim_cab_ipm', $current_page)) echo 'active'; ?>" href="<?php echo base_url('ortom/pim_cab_ipm') ?>">
                                                    PIMPINAN CABANG IPM
                                                </a>
                                                <a class="dropdown-item <?php if (is_active('kokam_kec_kasihan', $current_page)) echo 'active'; ?>" href="<?php echo base_url('ortom/kokam_kec_kasihan') ?>">
                                                    KOKAM KECAMATAN KASIHAN
                                                </a>
                                                <a class="dropdown-item <?php if (is_active('hw_kec_kasihan', $current_page)) echo 'active'; ?>" href="<?php echo base_url('ortom/hw_kec_kasihan') ?>">
                                                    HW KECAMATAN KASIHAN
                                                </a>
                                                <a class="dropdown-item <?php if (is_active('ts_kec_kasihan', $current_page)) echo 'active'; ?>" href="<?php echo base_url('ortom/ts_kec_kasihan') ?>">
                                                    TS KECAMATAN KASIHAN
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="nav-item dropdown <?php if (is_active(['sd_mst', 'sd_mmt', 'sd_msb', 'sd_mt', 'sd_mkt'], $current_page)) echo 'active'; ?>">
                                    <a class="nav-link dropdown-toggle" href="#navbar-layout" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                                        <span class="nav-link-title">
                                            Sekolah
                                        </span>
                                    </a>
                                    <div class="dropdown-menu">
                                        <div class="dropdown-menu-columns">
                                            <div class="dropdown-menu-column">
                                                <div class="dropend">
                                                    <a class="dropdown-item dropdown-toggle me-4" href="#sidebar-authentication" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                                                        SD MUHAMMADIYAH
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <a href="<?php echo base_url('sekolah/sd_mst') ?>" class="dropdown-item <?php if (is_active('sd_mst', $current_page)) echo 'active'; ?>">
                                                            SD MUHAMMADIYAH SENGGOTAN TIRTONIRMOLO
                                                        </a>
                                                        <a href="<?php echo base_url('sekolah/sd_mmt') ?>" class="dropdown-item <?php if (is_active('sd_mmt', $current_page)) echo 'active'; ?>">
                                                            SD MUHAMMADIYAH MRISI TIRTONIRMOLO
                                                        </a>
                                                        <a href="<?php echo base_url('sekolah/sd_msb') ?>" class="dropdown-item <?php if (is_active('sd_msb', $current_page)) echo 'active'; ?>">
                                                            SD MUHAMMADIYAH SAMBIKEREP BANGUNJIWO
                                                        </a>
                                                        <a href="<?php echo base_url('sekolah/sd_mt') ?>" class="dropdown-item <?php if (is_active('sd_mt', $current_page)) echo 'active'; ?>">
                                                            SD MUHAMMADIYAH TAMANTIRTO
                                                        </a>
                                                        <a href="<?php echo base_url('sekolah/sd_mkt') ?>" class="dropdown-item <?php if (is_active('sd_mkt', $current_page)) echo 'active'; ?>">
                                                            SD MUHAMMADIYAH KEMBARAN TAMANTIRTO
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="nav-item dropdown <?php if (is_active(['adminor', 'surat_masuk', 'surat_keluar', 'surat_tugas', 'surat_keputusan', 'notulen', 'daftar_sertifikat_wakaf', 'surat_aktif_org'], $current_page)) echo 'active'; ?>">
                                    <a class="nav-link dropdown-toggle" href="#navbar-layout" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                                        <span class="nav-link-title">
                                            Adminor
                                        </span>
                                    </a>
                                    <div class="dropdown-menu">
                                        <div class="dropdown-menu-columns">
                                            <div class="dropdown-menu-column">
                                                <a class="dropdown-item <?php if (is_active('surat_masuk', $current_page)) echo 'active'; ?>" href="<?php echo base_url('adminor/surat_masuk') ?> ">
                                                    SURAT MASUK
                                                </a>
                                                <a class="dropdown-item <?php if (is_active('surat_keluar', $current_page)) echo 'active'; ?>" href="<?php echo base_url('adminor/surat_keluar') ?>">
                                                    SURAT KELUAR
                                                </a>
                                                <a class="dropdown-item <?php if (is_active('surat_tugas', $current_page)) echo 'active'; ?>" href="">
                                                    SURAT TUGAS
                                                </a>
                                                <a class="dropdown-item <?php if (is_active('surat_keputusan', $current_page)) echo 'active'; ?>" href="<?php echo base_url('adminor/surat_keputusan') ?>">
                                                    SURAT KEPUTUSAN
                                                </a>
                                                <a class="dropdown-item <?php if (is_active('notulen', $current_page)) echo 'active'; ?>" href="<?php echo base_url('adminor/notulen') ?>">
                                                    NOTULENSI
                                                </a>
                                                <a class="dropdown-item <?php if (is_active('daftar_sertifikat_wakaf', $current_page)) echo 'active'; ?>" href="<?php echo base_url('adminor/daftar_sertifikat_wakaf') ?>">
                                                    DAFTAR & SERTIFIKAT WAKAF
                                                </a>
                                                <a class="dropdown-item <?php if (is_active('surat_aktif_org', $current_page)) echo 'active'; ?>" href="<?php echo base_url('adminor/surat_aktif_org') ?>">
                                                    SURAT AKTIF ORGANISASI
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="nav-item <?php if (is_active('kajian_hadist', $current_page)) echo 'active'; ?>">
                                    <a class="nav-link" href="<?php echo base_url('kajian_hadist/') ?>">

                                        <span class="nav-link-title">
                                            Kajian Hadist
                                        </span>
                                    </a>
                                </li>

                                <li class="nav-item <?php if (is_active('perguruan_paud', $current_page)) echo 'active'; ?>">
                                    <a class="nav-link" href="<?php echo base_url('perguruan/perguruan_paud') ?>">
                                        <span class="nav-link-title">
                                            Perguruan PAUD/TK
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item <?php if (is_active('perguruan_dasar', $current_page)) echo 'active'; ?>">
                                    <a class="nav-link" href="<?php echo base_url('perguruan/perguruan_dasar') ?>">

                                        <span class="nav-link-title">
                                            Perguruan Dasar
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item <?php if (is_active('perguruan_atas', $current_page)) echo 'active'; ?>">
                                    <a class="nav-link" href="<?php echo base_url('perguruan/perguruan_atas') ?>">

                                        <span class="nav-link-title">
                                            Perguruan Atas
                                        </span>
                                    </a>
                                </li>

                                <li class="nav-item <?php if (is_active('pustaka', $current_page)) echo 'active'; ?>">
                                    <a class="nav-link" href="<?php echo base_url('pustaka/') ?>">

                                        <span class="nav-link-title">
                                            Pustaka
                                        </span>
                                    </a>
                                </li>

                            </ul>
                            <div class="my-2 my-md-0 flex-grow-1 flex-md-grow-0 order-first order-md-last">

                            </div>
                        </div>
                    </div>
                </div>
            </header>
        </div>