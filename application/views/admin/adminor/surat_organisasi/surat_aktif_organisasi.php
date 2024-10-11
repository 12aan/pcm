<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Surat Keluar</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <a href="<?php echo base_url('adminor/tambah_surat_aktif_organisasi') ?>" class="m-0 font-weight-bold text-primary">Tambah Data</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->