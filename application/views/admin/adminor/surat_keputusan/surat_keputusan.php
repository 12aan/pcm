<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Surat Keputusan</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <!-- <button class="btn btn-primary"> -->
      <a href="<?php echo base_url('adminor/tambah_surat_keputusan_agenda') ?>" class=" btn btn-primary mt-2">Tambah Data Agenda</a>
      <!-- </button> -->
      <!-- <button class="btn btn-secondary"> -->
      <a href="<?php echo base_url('adminor/tambah_surat_keputusan') ?>" class=" btn btn-primary mt-2">Tambah Data Surat</a>
      <!-- </button> -->
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Tanggal</th>
              <th>Agenda</th>
              <th>Nama Surat</th>
              <th>File Path</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            <!-- Data Rows Go Here -->
            <?php if (!empty($surat_keputusan)) : ?>
              <?php $nomor = 1; // Inisialisasi nomor 
              ?>
              <?php foreach ($surat_keputusan as $row) : ?>
                <tr>
                  <td><?php echo $nomor++; ?></td>
                  <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?php echo $row['tanggal']; ?></td>
                  <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?php echo $row['agenda']; ?></td>
                  <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?php echo $row['nama_surat']; ?></td>

                  <td>
                    <?php if (!empty($row['file_path'])) : ?>
                      <?php
                      $path_parts = pathinfo($row['file_path']);
                      echo $path_parts['basename']; // Menampilkan nama file saja
                      ?>
                    <?php else : ?>
                      <span>No Avatar</span>
                    <?php endif; ?>
                  </td>
                  <!-- <i class="fas fa-plus"></i> -->
                  <td class="text-center">
                    <a href="<?php echo base_url('adminor/edit_data_keputusan/' . $row['id_keputusan']); ?>" style="color: #3498db; margin-right: 10px;"><i class="fas fa-edit" data-toggle="tooltip" title="Edit Data"></i></a>
                    <a href="<?php echo base_url('adminor/hapus_data_keputusan/' . $row['id_keputusan']); ?>" onclick="return confirm('Are you sure you want to delete this item?');" style="color: #e74c3c; "><i class=" fas fa-trash" data-toggle="tooltip" title="Hapus Data"></i></a>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else : ?>
              <tr>
                <td colspan=" 6">Tidak ada data surat masuk.</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->