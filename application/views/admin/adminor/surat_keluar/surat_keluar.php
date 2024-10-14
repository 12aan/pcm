<!-- Begin Page Content -->
<div class="container-fluid">



  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <!-- Page Heading -->

    <div class="card-header py-3">
      <h1 class="h3 mb-2 text-gray-800 border-bottom pb-2">Surat Keluar</h1>

      <!-- <button class="btn btn-primary"> -->
      <a href="<?php echo base_url('adminor/tambah_surat_keluar') ?>">
        <button class=" btn btn-primary mt-2">Tambah Data Agenda</button>
      </a>
      <!-- </button> -->
      <!-- <button class="btn btn-secondary"> -->
      <a href="<?php echo base_url('adminor/tambah_surat_keluar_agenda') ?>">
        <button class=" btn btn-primary mt-2">Tambah Data Surat</button>
      </a>
      <!-- </button> -->

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

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->