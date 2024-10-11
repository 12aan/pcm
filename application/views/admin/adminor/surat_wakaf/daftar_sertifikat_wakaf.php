<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Daftar Sertifikat Wakaf</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <a href="<?php echo base_url('adminor/tambah_surat_wakaf') ?>" class="m-0 font-weight-bold text-primary">Tambah Data</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->