<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->


  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div>
        <h1 class="h3 mb-2 text-gray-800 border-bottom pb-2">Surat Masuk</h1>
      </div>

      <a href="<?php echo base_url('adminor/tambah_surat_masuk') ?>" class=" btn btn-primary mt-2">Tambah Data Surat</a>
      <!-- <button class="btn btn-primary"> -->
      <a href="<?php echo base_url('adminor/tambah_surat_masuk_agenda') ?>" class=" btn btn-primary mt-2">Tambah Data Agenda</a>
      <!-- </button> -->
      <!-- <button class="btn btn-secondary"> -->
      <!-- </button> -->
      <div class="row">
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
            <!-- Data Rows Go Here -->
            <?php if (!empty($surat_masuk)) : ?>
              <?php $nomor = 1; // Inisialisasi nomor 
              ?>
              <?php foreach ($surat_masuk as $row) : ?>
                <tr>
                  <td><?php echo $nomor++; ?></td>
                  <td><?php echo date('d-m-Y', strtotime($row['tanggal'])); ?></td>
                  <td><?php echo $row['agenda']; ?></td>
                  <td><?php echo $row['nama_surat']; ?></td>
                  <!-- <i class="fas fa-plus"></i> -->
                  <td class="text-center">
                    <a href="<?php echo base_url('adminor/edit_data_surat_masuk/' . $row['id_masuk']); ?>" style="color: #3498db; margin-right: 10px;"><i class="fas fa-edit" data-toggle="tooltip" title="Edit Data"></i></a>
                    <a href="<?php echo base_url('adminor/hapus_data/' . $row['id_masuk']); ?>" onclick="return confirm('Are you sure you want to delete this item?');" style="color: #e74c3c; "><i class=" fas fa-trash" data-toggle="tooltip" title="Hapus data"></i></a>
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