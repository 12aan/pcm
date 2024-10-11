<!-- Begin Page Content -->
<div class="container-fluid">


    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tambah Data Menu</h4>
            </div>
            <div class="card-body">
                <form action="<?php echo base_url('menu/tambah_data_menu'); ?>" method="post">
                    <div class="form-group">
                        <label for="judul_menu">Judul Menu</label>
                        <input type="text" class="form-control" id="judul_menu" name="judul_menu" required>
                    </div>
                    <div class="form-group">
                        <label for="url_menu">URL Menu</label>
                        <input type="text" class="form-control" id="url_menu" name="url_menu">
                    </div>
                    <div class="form-group">
                        <label for="aktif_menu">Status</label>
                        <select class="form-control" id="aktif_menu" name="aktif_menu">
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                    </div>
                    <div id="submenu-container">
                        <!-- Submenu fields will be added here -->
                    </div>
                    <button type="button" id="add-submenu" class="btn btn-secondary">Tambah Submenu</button>
                    <button type="submit" class="btn btn-primary">Tambah Menu</button>
                </form>

            </div>
        </div>
    </section>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script>
        $(document).ready(function() {
            $('#add-submenu').click(function() {
                var newSubmenu = `
            <div class="form-group submenu-item">
                <hr>
                <label for="judul_submenu">Judul Submenu</label>
                <input type="text" class="form-control" name="submenujudul[]" required>
                <label for="url_submenu">URL Submenu</label>
                <input type="text" class="form-control" name="submenuurl[]">
                <label for="aktif_submenu">Status</label>
                <select class="form-control" name="submenuaktif[]">
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
                </select>
                <button type="button" class="btn btn-danger remove-submenu">Hapus Submenu</button>
            </div>
        `;
                $('#submenu-container').append(newSubmenu);
            });

            $(document).on('click', '.remove-submenu', function() {
                $(this).closest('.submenu-item').remove();
            });
        });
    </script>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->