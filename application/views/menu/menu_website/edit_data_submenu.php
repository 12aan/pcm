<!-- Begin Page Content -->
<div class="container-fluid">

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Data Submenu</h4>
            </div>
            <div class="card-body">
                <form action="<?php echo base_url('menu/edit_data_submenu/' . $submenu['idsubmenu']); ?>" method="post">
                    <div class="form-group">
                        <label for="judul_submenu">Judul Submenu</label>
                        <input type="text" class="form-control" id="judul_submenu" name="judul_submenu" value="<?php echo $submenu['judul']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="url_submenu">URL Submenu</label>
                        <input type="text" class="form-control" id="url_submenu" name="url_submenu" value="<?php echo $submenu['url']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="idmenu">Menu</label>
                        <select class="form-control" id="idmenu" name="idmenu">
                            <?php foreach ($menu as $menu_item) : ?>
                                <option value="<?php echo $menu_item['idmenu']; ?>" <?php echo ($submenu['idmenu'] == $menu_item['idmenu']) ? 'selected' : ''; ?>><?php echo $menu_item['judul']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="aktif_submenu">Status</label>
                        <select class="form-control" id="aktif_submenu" name="aktif_submenu">
                            <option value="1" <?php echo ($submenu['aktif'] == 1) ? 'selected' : ''; ?>>Aktif</option>
                            <option value="0" <?php echo ($submenu['aktif'] == 0) ? 'selected' : ''; ?>>Tidak Aktif</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Submenu</button>
                </form>
            </div>
        </div>
    </section>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->