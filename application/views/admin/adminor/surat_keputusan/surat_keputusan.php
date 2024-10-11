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
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Tiger Nixon</td>
              <td>System Architect</td>
              <td>Edinburgh</td>
              <td>61</td>
              <td>2011/04/25</td>

            </tr>
            <tr>
              <td>Garrett Winters</td>
              <td>Accountant</td>
              <td>Tokyo</td>
              <td>63</td>
              <td class="text-center">
                <a href="<?php echo base_url('adminor/edit_surat_keputusan') ?>" style="color: #3498db; margin-right: 10px;"><i class="fas fa-edit" data-toggle="tooltip" title="Edit Data"></i></a>
                <a href="" onclick="return confirm('Are you sure you want to delete this item?');" style="color: #e74c3c; "><i class=" fas fa-trash" data-toggle="tooltip" title="Hapus data"></i></a>
              </td>
            </tr>

          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->