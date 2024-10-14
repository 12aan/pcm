<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Kabar Ranting</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <a href="<?php echo base_url('berita/tambah_data_kabar_ranting') ?>" class="btn btn-primary mt-2">Tambah Data</a>
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
            <?php if (!empty($kabar_ranting)) : ?>
              <?php $nomor = 1; // Inisialisasi nomor 
              ?>
              <?php foreach ($kabar_ranting as $row) : ?>
                <tr>
                  <td><?php echo $nomor++; ?></td>
                  <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?php echo date('d-m-Y', strtotime($row['tanggal_upload'])); ?></td>
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
                    <a href="<?php echo base_url('berita/edit_data_kabar_ranting/' . $row['id_kabar_ranting']); ?>" style="color: #3498db; margin-right: 10px;"><i class="fas fa-edit" data-toggle="tooltip" title="Edit Data"></i></a>
                    <a href="<?php echo base_url('berita/hapus_data_kabar_ranting/' . $row['id_kabar_ranting']); ?>" onclick="return confirm('Are you sure you want to delete this item?');" style="color: #e74c3c; "><i class=" fas fa-trash" data-toggle="tooltip" title="Hapus Data"></i></a>
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