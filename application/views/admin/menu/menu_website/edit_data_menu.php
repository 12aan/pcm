<!-- Begin Page Content -->
<div class="container-fluid">

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Data Menu</h4>
            </div>
            <div class="card-body">
                <form action="<?php echo base_url('menu/edit_data_menu/' . $menu['idmenu']); ?>" method="post">
                    <div class="form-group">
                        <label for="judul_menu">Judul Menu</label>
                        <input type="text" class="form-control" id="judul_menu" name="judul_menu" value="<?php echo $menu['judul']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="url_menu">URL Menu</label>
                        <input type="text" class="form-control" id="url_menu" name="url_menu" value="<?php echo $menu['url']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="aktif_menu">Status</label>
                        <select class="form-control" id="aktif_menu" name="aktif_menu">
                            <option value="1" <?php echo ($menu['aktif'] == 1) ? 'selected' : ''; ?>>Aktif</option>
                            <option value="0" <?php echo ($menu['aktif'] == 0) ? 'selected' : ''; ?>>Tidak Aktif</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Menu</button>
                </form>
            </div>
        </div>
    </section>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->