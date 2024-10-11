<!DOCTYPE html>
<html lang="en">



<body>
    <script src="<?php echo base_url('assets/static/js/initTheme.js') ?>"></script>
    <div id="app">

        <div id="main-content">
            <!-- <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header> -->

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">

                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Layout Default</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Surat Wakaf</h4>
                        </div>
                        <div class="card-body">
                            <?php if ($this->session->flashdata('success')) { ?>
                                <div class="alert alert-success">
                                    <?php echo $this->session->flashdata('success'); ?>
                                </div>
                            <?php } ?>
                            <a href="<?php echo base_url('adminor/tambah_surat_wakaf') ?>">Tambah Data</a>
                            <div class="table-responsive datatable-minimal">
                                <table class="table" id="table2">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Nama Surat Wakaf</th>
                                            <th>Nama Masjid</th>
                                            <th>File Path Sertifikat Wakaf</th>
                                            <th>Tanggal</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Data Rows Go Here -->
                                        <?php if (!empty($sertifikat_wakaf)) : ?>
                                            <?php $nomor = 1; // Inisialisasi nomor 
                                            ?>
                                            <?php foreach ($sertifikat_wakaf as $row) : ?>
                                                <tr>
                                                    <td><?php echo $nomor++; ?></td>
                                                    <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?php echo $row['nama_surat_wakaf']; ?></td>
                                                    <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?php echo $row['nama_masjid']; ?></td>
                                                    <td>
                                                        <?php if (!empty($row['file_path_sertifikat_wakaf'])) : ?>
                                                            <?php
                                                            $path_parts = pathinfo($row['file_path_sertifikat_wakaf']);
                                                            echo $path_parts['basename']; // Menampilkan nama file saja
                                                            ?>
                                                        <?php else : ?>
                                                            <span>No Avatar</span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <!-- <i class="fas fa-plus"></i> -->
                                                    <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?php echo $row['tanggal']; ?></td>

                                                    <td class="text-center">
                                                        <a href="<?php echo base_url('adminor/edit_data_wakaf/' . $row['id_wakaf']); ?>" style="color: #3498db; margin-right: 10px;"><i class="fas fa-edit" data-toggle="tooltip" title="Edit Data"></i></a>
                                                        <a href="<?php echo base_url('adminor/hapus_data_wakaf/' . $row['id_wakaf']); ?>" onclick="return confirm('Are you sure you want to delete this item?');" style="color: #e74c3c; "><i class=" fas fa-trash" data-toggle="tooltip" title="Hapus Data"></i></a>
                                                    </td>


                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <tr>
                                                <td colspan=" 6">Tidak ada data surat masuk.</td>
                                            </tr>
                                        <?php endif; ?>
                                        <!-- End Data Rows -->


                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </section>
            </div>

        </div>
    </div>
    <script src="<?php echo base_url('/assets/static/js/components/dark.js') ?>"></script>
    <script src="<?php echo base_url('/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') ?>"></script>

    <script src="<?php echo base_url('/assets/compiled/js/app.js') ?>"></script>



</body>

</html>