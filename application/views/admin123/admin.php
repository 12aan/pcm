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
                                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/admin/') ?>">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Admin</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Admin</h4>
                        </div>
                        <div class="card-body">
                            <?php if ($this->session->flashdata('success')) { ?>
                                <div class="alert alert-success">
                                    <?php echo $this->session->flashdata('success'); ?>
                                </div>
                            <?php } ?>
                            <a href="<?php echo base_url('admin/tambah_admin') ?>">Tambah Data</a>
                            <div class="table-responsive datatable-minimal">
                                <table class="table" id="table2">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Admin</th>
                                            <th style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Tanggal Lahir</th>
                                            <th>Alamat</th>
                                            <th>Email</th>
                                            <th>No_Hp</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Avatar</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Data Rows Go Here -->
                                        <?php if (!empty($admin)) : ?>
                                            <?php $nomor = 1; // Inisialisasi nomor 
                                            ?>
                                            <?php foreach ($admin as $row) : ?>
                                                <tr>
                                                    <td><?php echo $nomor++; ?></td>
                                                    <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?php echo $row['nama_admin']; ?></td>
                                                    <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?php echo date('d-m-Y', strtotime($row['tanggal_lahir'])); ?></td>
                                                    <td><?php echo $row['alamat']; ?></td>
                                                    <td><?php echo $row['email']; ?></td>
                                                    <td><?php echo $row['no_hp']; ?></td>
                                                    <td><?php echo $row['username']; ?></td>
                                                    <td><?php echo $row['password']; ?></td>
                                                    <td>
                                                        <?php if (!empty($row['avatar'])) : ?>
                                                            <img src="<?php echo base_url('uploads/' . $row['avatar']); ?>" alt="Avatar" width="50">
                                                        <?php else : ?>
                                                            <span>No Avatar</span>
                                                        <?php endif; ?>
                                                    </td>

                                                    <!-- <i class="fas fa-plus"></i> -->
                                                    <td class="text-center">
                                                        <a href="<?php echo base_url('admin/edit_data_admin/' . $row['id_admin']); ?>" style="color: #3498db; margin-right: 10px;"><i class="fas fa-edit" data-toggle="tooltip" title="Edit Data"></i></a>
                                                        <a href="<?php echo base_url('admin/hapus_admin/' . $row['id_admin']); ?>" onclick="return confirm('Are you sure you want to delete this item?');" style="color: #e74c3c; "><i class=" fas fa-trash" data-toggle="tooltip" title="Hapus data"></i></a>
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