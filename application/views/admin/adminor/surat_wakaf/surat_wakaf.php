<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h1 class="h3 mb-2 text-gray-800 border-bottom pb-2">Daftar Sertifikat Wakaf</h1>

      <a href="<?php echo base_url('adminor/tambah_surat_wakaf') ?>" class="m-0 font-weight-bold text-primary">Tambah Data</a>
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
              <th style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Nama Surat Wakaf</th>
              <th>Nama Masjid</th>
              <th>Tanggal Upload</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            <!-- Data Rows Go Here -->
            <?php if (!empty($sertifikat_wakaf)) : ?>
              <?php
              $nomor = 1; // Inisialisasi nomor 

              // Function untuk mengubah format tanggal menjadi '13-10-2024'
              function formatTanggal($tanggal)
              {
                return date('d-m-Y', strtotime($tanggal)); // Mengembalikan tanggal dalam format '13-10-2024'
              }
              ?>
              <?php foreach ($sertifikat_wakaf as $row) : ?>
                <tr>
                  <td><?php echo $nomor++; ?></td>

                  <!-- Nama Surat Wakaf: maksimal 30 karakter dan tooltip -->
                  <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" title="<?php echo $row['nama_surat_wakaf']; ?>">
                    <?php echo strlen($row['nama_surat_wakaf']) > 30 ? substr($row['nama_surat_wakaf'], 0, 30) . '...' : $row['nama_surat_wakaf']; ?>
                  </td>

                  <!-- Nama Masjid: maksimal 30 karakter dan tooltip -->
                  <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" title="<?php echo $row['nama_masjid']; ?>">
                    <?php echo strlen($row['nama_masjid']) > 30 ? substr($row['nama_masjid'], 0, 30) . '...' : $row['nama_masjid']; ?>
                  </td>

                  <!-- Tanggal format d-m-Y -->
                  <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?php echo formatTanggal($row['tanggal']); ?></td>

                  <!-- Tombol Aksi (Edit & Hapus) -->
                  <td class="text-center">
                    <a href="<?php echo base_url('adminor/edit_data_wakaf/' . $row['id_wakaf']); ?>" style="color: #3498db; margin-right: 10px;">
                      <i class="fas fa-edit" data-toggle="tooltip" title="Edit Data"></i>
                    </a>
                    <a href="<?php echo base_url('adminor/hapus_data_wakaf/' . $row['id_wakaf']); ?>" onclick="return confirm('Are you sure you want to delete this item?');" style="color: #e74c3c;">
                      <i class="fas fa-trash" data-toggle="tooltip" title="Hapus Data"></i>
                    </a>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else : ?>
              <tr>
                <td colspan="6">Tidak ada data surat masuk.</td>
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