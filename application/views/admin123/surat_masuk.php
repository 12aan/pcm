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
                            <h4 class="card-title">Surat Masuk</h4>
                        </div>
                        <div class="card-body">
                            <?php if ($this->session->flashdata('success')) { ?>
                                <div class="alert alert-success">
                                    <?php echo $this->session->flashdata('success'); ?>
                                </div>
                            <?php } ?>
                            <button class="btn btn-primary">
                                <a href="<?php echo base_url('adminor/tambah_surat') ?>" class="btn-primary">Tambah Data Agenda</a>
                            </button>
                            <button class="btn btn-secondary">
                                <a href="<?php echo base_url('adminor/tambah_surat_masuk_agenda') ?>" class="btn-primary">Tambah Data Surat</a>
                            </button>
                            <div class="table-responsive datatable-minimal">
                                <table class="table" id="table2">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Agenda</th>
                                            <th>Nama Surat</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Data Rows Go Here -->
                                        <?php if (!empty($surat_masuk)) : ?>
                                            <?php $nomor = 1; // Inisialisasi nomor 
                                            ?>
                                            <?php foreach ($surat_masuk as $row) : ?>
                                                <tr>
                                                    <td><?php echo $nomor++; ?></td>
                                                    <td><?php echo date('d-m-Y', strtotime($row['tanggal'])); ?></td>
                                                    <td><?php echo $row['agenda']; ?></td>
                                                    <td><?php echo $row['nama_surat']; ?></td>
                                                    <!-- <i class="fas fa-plus"></i> -->
                                                    <td class="text-center">
                                                        <a href="<?php echo base_url('adminor/edit_data_surat_masuk/' . $row['id_masuk']); ?>" style="color: #3498db; margin-right: 10px;"><i class="fas fa-edit" data-toggle="tooltip" title="Edit Data"></i></a>
                                                        <a href="<?php echo base_url('adminor/hapus_data/' . $row['id_masuk']); ?>" onclick="return confirm('Are you sure you want to delete this item?');" style="color: #e74c3c; "><i class=" fas fa-trash" data-toggle="tooltip" title="Hapus data"></i></a>
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