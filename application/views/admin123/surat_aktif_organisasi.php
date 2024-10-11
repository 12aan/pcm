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
                            <h4 class="card-title">Surat Aktif Organisasi</h4>
                        </div>
                        <div class="card-body">
                            <?php if ($this->session->flashdata('success')) { ?>
                                <div class="alert alert-success">
                                    <?php echo $this->session->flashdata('success'); ?>
                                </div>
                            <?php } ?>
                            <a href="<?php echo base_url('adminor/tambah_surat_aktif_organisasi') ?>">Tambah Data</a>
                            <div class="table-responsive datatable-minimal">
                                <table class="table" id="table2">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Email</th>
                                            <th style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Nama Lengkap</th>
                                            <th style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Tanggal Lahir</th>
                                            <th style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Alamat Tinggal</th>
                                            <th>No Hp</th>
                                            <th style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Instansi Kerja</th>
                                            <th style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Alamat Instansi Kerja</th>
                                            <th style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Telepon Kantor Kerja</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($surat_aktif_organisasi)) : ?>
                                            <?php $nomor = 1; ?>
                                            <?php foreach ($surat_aktif_organisasi as $row) : ?>
                                                <tr>
                                                    <td><?php echo $nomor++; ?></td>
                                                    <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?php echo $row['email']; ?></td>
                                                    <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?php echo $row['nama_lengkap']; ?></td>
                                                    <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?php echo $row['tanggal_lahir']; ?></td>
                                                    <td><?php echo $row['alamat_tinggal']; ?></td>
                                                    <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?php echo $row['no_hp']; ?></td>
                                                    <td><?php echo $row['instansi_kerja']; ?></td>
                                                    <td><?php echo $row['alamat_instansi_kerja']; ?></td>
                                                    <td><?php echo $row['telepon_kantor_kerja']; ?></td>
                                                    <td class="text-center">
                                                        <a href="<?php echo base_url('adminor/lihat_data_anggota_organisasi/' . $row['id_aktif']); ?>">
                                                            <i class="fas fa-key" data-toggle="tooltip" title="Lihat Data" style="color: #3498db; margin-right: 5px;"></i>
                                                        </a>

                                                        <a href="<?php echo base_url('adminor/hapus_data_surat_organisasi/' . $row['id_aktif']); ?>" onclick="return confirm('Are you sure you want to delete this item?');" style="color: #e74c3c;">
                                                            <i class="fas fa-trash" data-toggle="tooltip" title="Hapus data"></i>
                                                        </a>
                                                    </td>

                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <tr>
                                                <td colspan="8">Tidak ada data surat masuk.</td>
                                            </tr>
                                        <?php endif; ?>
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