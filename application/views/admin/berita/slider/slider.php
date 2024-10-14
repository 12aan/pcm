<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Slider</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <a href="<?php echo base_url('berita/tambah_data_slider') ?>" class="btn btn-primary mt-2">Tambah Data</a>
      <div class=" row">
        <div class="col-lg-8 mt-3">
          <?= $this->session->flashdata('message'); ?>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
            <?php if (!empty($slider)) : ?>
              <?php $nomor = 1; // Inisialisasi nomor 
              ?>
              <?php foreach ($slider as $row) : ?>
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
                    <a href="<?php echo base_url('berita/edit_data_slider/' . $row['id_slider']); ?>" style="color: #3498db; margin-right: 10px;"><i class="fas fa-edit" data-toggle="tooltip" title="Edit Data"></i></a>
                    <a href="<?php echo base_url('berita/hapus_data_slider/' . $row['id_slider']); ?>" onclick="return confirm('Are you sure you want to delete this item?');" style="color: #e74c3c; "><i class=" fas fa-trash" data-toggle="tooltip" title="Hapus Data"></i></a>
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

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->