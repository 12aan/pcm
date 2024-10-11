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
                            <h4 class="card-title">Surat Keluar</h4>
                        </div>
                        <div class="card-body">
                            <?php if ($this->session->flashdata('success')) { ?>
                                <div class="alert alert-success">
                                    <?php echo $this->session->flashdata('success'); ?>
                                </div>
                            <?php } ?>

                            <button class="btn btn-primary">
                                <a href="<?php echo base_url('adminor/tambah_surat_keluar') ?>" class="btn-primary">Tambah Data Agenda</a>
                            </button>
                            <button class="btn btn-secondary">
                                <a href="<?php echo base_url('adminor/tambah_surat_keluar_agenda') ?>" class="btn-primary">Tambah Data Surat</a>
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
                                        <?php if (!empty($surat_keluar)) : ?>
                                            <?php $nomor = 1; ?>
                                            <?php foreach ($surat_keluar as $row) : ?>
                                                <tr>
                                                    <td><?php echo $nomor++; ?></td>
                                                    <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?php echo date('d-m-Y', strtotime($row['tanggal'])); ?></td>
                                                    <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?php echo $row['agenda']; ?></td>
                                                    <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?php echo $row['nama_surat']; ?></td>
                                                    <!-- <i class="fas fa-plus"></i> -->
                                                    <td class="text-center">
                                                        <a href="<?php echo base_url('adminor/edit_data_keluar/' . $row['id_keluar']); ?>" style="color: #3498db; margin-right: 10px;"><i class="fas fa-edit" data-toggle="tooltip" title="Edit Data"></i></a>
                                                        <a href="<?php echo base_url('adminor/hapus_data_keluar/' . $row['id_keluar']); ?>" onclick="return confirm('Are you sure you want to delete this item?');" style="color: #e74c3c; "><i class=" fas fa-trash" data-toggle="tooltip" title="Hapus Data"></i></a>
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