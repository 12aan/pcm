<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Data Admin</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <a href="<?php echo base_url('admin/tambah_data_admin') ?>" class="btn btn-primary mt-2">Tambah Data</a>
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
              <th>Nama Admin</th>
              <th>Email</th>
              <th>Image</th>
              <th>Role ID</th>
              <th>Active</th>
              <th>Date Created</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($admins)) : ?>
              <?php $nomor = 1; ?>
              <?php foreach ($admins as $admin) : ?>
                <tr>
                  <td><?php echo $nomor++; ?></td>
                  <td><?php echo $admin['name']; ?></td>
                  <td><?php echo $admin['email']; ?></td>
                  <td>
                    <?php if (!empty($admin['image'])) : ?>
                      <img src="<?php echo base_url('assets12/img/profile/' . $admin['image']); ?>" alt="<?php echo htmlspecialchars($admin['name']); ?>'s Avatar" width="50">

                    <?php else : ?>
                      <span>No Avatar</span>
                    <?php endif; ?>
                  </td>
                  <td><?php echo $admin['role_id']; ?></td>
                  <td><?php echo $admin['is_active']; ?></td>
                  <td><?php echo date('d M Y', $admin['date_created']); ?></td>
                  <td class="text-center">
                    <a href="<?php echo base_url('admin/edit_data_admin/' . $admin['id']); ?>" class="text-info mr-3">
                      <i class="fas fa-edit" data-toggle="tooltip" title="Edit Data"></i>
                    </a>
                    <a href="<?php echo base_url('admin/hapus_admin/' . $admin['id']); ?>" onclick="return confirm('Yakin ingin menghapus data ini?');" class="text-danger">
                      <i class="fas fa-trash" data-toggle="tooltip" title="Hapus Data"></i>
                    </a>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else : ?>
              <tr>
                <td colspan="8" class="text-center">Tidak ada data admin.</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->