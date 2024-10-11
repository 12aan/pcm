<!-- Begin Page Content -->
<div class="container-fluid">


  <!-- DataTales Example -->
  <div class="card shadow mb-4">

    <div class="card-header">
      <h4 class="card-title">Menu Website</h4>
    </div>
    <div class="card-header py-3">
      <a href="<?php echo base_url('menu/tambah_data_menu') ?>" class="m-0 font-weight-bold text-primary">Tambah Data</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Judul Menu</th>
              <th>URL</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // Fungsi untuk memotong URL panjang
            function singkatkan_url($url, $limit = 30)
            {
              if (strlen($url) > $limit) {
                return substr($url, 0, $limit) . '...'; // Potong URL dan tambahkan '...'
              } else {
                return $url; // Jika URL kurang dari limit, tampilkan apa adanya
              }
            }

            foreach ($menu as $index => $m) : ?>
              <tr>
                <td><?php echo $index + 1; ?></td>
                <td><?php echo $m['judul']; ?></td>
                <td><?php echo singkatkan_url($m['url']); ?></td> <!-- Memotong URL -->
                <td><?php echo $m['aktif'] ? 'Aktif' : 'Tidak Aktif'; ?></td>
                <td class="text-center">
                  <a href="<?php echo base_url('menu/edit_data_menu/' . $m['idmenu']); ?>" class="text-info mr-3">
                    <i class="fas fa-edit" data-toggle="tooltip" title="Edit Data Menu"></i>
                  </a>
                  <a href="<?php echo base_url('menu/hapus_data_menu/' . $m['idmenu']); ?>" onclick="return confirm('Yakin ingin menghapus data ini?');" class="text-danger">
                    <i class="fas fa-trash" data-toggle="tooltip" title="Hapus Data Menu"></i>
                  </a>
                </td>
              </tr>
              <!-- List submenus for this menu -->
              <?php
              $subIndex = 1;
              foreach ($submenu as $s) : ?>
                <?php if ($s['idmenu'] == $m['idmenu']) : ?>
                  <tr>
                    <td><?php echo ($index + 1) . '.' . $subIndex++; ?></td>
                    <td>-- <?php echo $s['judul']; ?></td>
                    <td><?php echo singkatkan_url($s['url']); ?></td> <!-- Memotong URL submenu -->
                    <td><?php echo $s['aktif'] ? 'Aktif' : 'Tidak Aktif'; ?></td>
                    <td class="text-center">
                      <a href="<?php echo base_url('menu/edit_data_submenu/' . $s['idsubmenu']); ?>" class="text-info mr-3">
                        <i class="fas fa-edit" data-toggle="tooltip" title="Edit Data SubMenu"></i>
                      </a>
                      <a href="<?php echo base_url('menu/hapus_data_submenu/' . $s['idsubmenu']); ?>" onclick="return confirm('Yakin ingin menghapus data ini?');" class="text-danger">
                        <i class="fas fa-trash" data-toggle="tooltip" title="Hapus Data SubMenu"></i>
                      </a>
                    </td>
                  </tr>
                <?php endif; ?>
              <?php endforeach; ?>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->