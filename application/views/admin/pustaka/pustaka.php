<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Pustaka</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <a href="<?php echo base_url('pustaka/tambah_pustaka') ?>" class="btn btn-primary mt-2">Tambah Data</a>

    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Tanggal</th>
              <th>Judul</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Tiger Nixon</td>
              <td>System Architect</td>
              <td>Edinburgh</td>
              <td>
                <div class="action-icons" style="display: flex; align-items: center; justify-content: center;">
                  <a href="<?php echo base_url('pustaka/edit_pustaka/'); ?>" style="color: #3498db; margin-right: 10px;" class="fas fa-edit"></a>
                  <a href="<?php echo base_url('profile/'); ?>" style="color: #e74c3c;" class="fas fa-trash"></a>
                </div>
              </td>
            </tr>
            <tr>
              <td>Garrett Winters</td>
              <td>Accountant</td>
              <td>63</td>
              <td>2011/07/25</td>
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