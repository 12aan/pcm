<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <form action="<?= base_url('menu/tambah_data_submenu'); ?>" method="post">
        <div class="form-group">
            <label for="idmenu">Pilih Menu Utama</label>
            <select class="form-control" id="idmenu" name="idmenu">
                <?php foreach ($menu as $m) : ?>
                    <option value="<?= $m['idmenu']; ?>"><?= $m['judul']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="judul_submenu">Judul Submenu</label>
            <input type="text" class="form-control" id="judul_submenu" name="judul_submenu">
        </div>
        <div class="form-group">
            <label for="url_submenu">URL Submenu</label>
            <input type="text" class="form-control" id="url_submenu" name="url_submenu">
        </div>
        <div class="form-group">
            <label for="aktif_submenu">Status</label>
            <select class="form-control" id="aktif_submenu" name="aktif_submenu">
                <option value="1">Aktif</option>
                <option value="0">Tidak Aktif</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Submenu</button>
    </form>
</div>