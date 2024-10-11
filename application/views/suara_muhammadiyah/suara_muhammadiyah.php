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
                                    <li class="breadcrumb-item active" aria-current="page">Suara Muhammadiyah</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Suara Muhammadiyah</h4>

                            <?php if ($this->session->flashdata('success')) { ?>
                                <div class="alert alert-success">
                                    <?php echo $this->session->flashdata('success'); ?>
                                </div>
                            <?php } ?>
                            <a href="<?php echo base_url('suara_muhammadiyah/tambah_data_suaramuhammadiyah') ?>" class="btn btn-primary mt-2">Tambah Data</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive datatable-minimal">
                                <table class="table" id="table2">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Judul</th>
                                            <th>Avatar</th>
                                            <th class="text-center">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Data Rows Go Here -->
                                        <?php if (!empty($suara_muhammadiyah)) : ?>
                                            <?php $nomor = 1; // Inisialisasi nomor 
                                            ?>
                                            <?php foreach ($suara_muhammadiyah as $row) : ?>
                                                <tr>
                                                    <td><?php echo $nomor++; ?></td>
                                                    <td><?php echo date('d-m-Y', strtotime($row['tanggal_upload'])); ?></td>
                                                    <td><?php echo $row['judul_berita']; ?></td>
                                                    <td>
                                                        <?php if (!empty($row['avatar'])) : ?>
                                                            <?php $file_extension = pathinfo($row['avatar'], PATHINFO_EXTENSION); ?>
                                                            <?php if (in_array($file_extension, ['jpg', 'jpeg', 'png', 'gif'])) : ?>
                                                                <img src="<?php echo base_url('uploads/' . $row['avatar']); ?>" alt="avatar" width="50">
                                                            <?php elseif ($file_extension === 'pdf') : ?>
                                                                <embed src="<?php echo base_url('uploads/' . $row['avatar']); ?>" type="application/pdf" width="50" height="50">
                                                            <?php else : ?>
                                                                <a href="<?php echo base_url('uploads/' . $row['avatar']); ?>" target="_blank"><?php echo $row['avatar']; ?></a>
                                                            <?php endif; ?>
                                                        <?php else : ?>
                                                            <span>No Avatar</span>
                                                        <?php endif; ?>
                                                    </td>

                                                    <td class="text-center">
                                                        <a href="<?php echo base_url('suara_muhammadiyah/edit_data_suaramuhammadiyah/' . $row['id_suara']); ?>" style="color: #3498db; margin-right: 10px;"><i class="fas fa-edit" data-toggle="tooltip" title="Edit Data"></i></a>
                                                        <a href="<?php echo base_url('suara_muhammadiyah/hapus_data_suaramuhammadiyah/' . $row['id_suara']); ?>" onclick="return confirm('Are you sure you want to delete this item?');" style="color: #e74c3c; "><i class=" fas fa-trash" data-toggle="tooltip" title="Hapus Data"></i></a>
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