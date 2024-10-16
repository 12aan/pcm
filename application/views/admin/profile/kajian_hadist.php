<!-- Form Tambah Kajian Hadist -->
<div class="container-fluid">
    <h4>Tambah Kajian Hadist</h4>
    <form action="<?= base_url('profile/upload_kajian'); ?>" method="post">
        <div class="form-group">
            <label for="judul_kajian">Judul Kajian</label>
            <input type="text" class="form-control" id="judul_kajian" name="judul_kajian" required>
        </div>
        <div class="form-group">
            <label for="isi_kajian">Isi Kajian</label>
            <textarea class="form-control" id="editor1" name="isi_kajian" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Kajian</button>
    </form>
</div>

<script>
    CKEDITOR.replace('editor1', {
        filebrowserImageBrowseUrl: '<?php echo base_url('assets/kcfinder'); ?>',
        filebrowserUploadUrl: '<?php echo base_url('assets/kcfinder'); ?>',
        filebrowserImageUploadUrl: '<?php echo base_url('assets/kcfinder/upload.php?type=images'); ?>'
    });
</script>

<!-- Tombol untuk melihat daftar kajian hadist -->
<div class="container-fluid mt-4">
    <button id="lihatDaftar" class="btn btn-success">Lihat Daftar Kajian Hadist</button>
</div>

<!-- Daftar Kajian Hadist (Awalnya disembunyikan) -->
<div id="daftarKajian" class="container-fluid mt-4" style="display: none;">
    <h4>Daftar Kajian Hadist</h4>
    <table class="table">
        <thead>
            <tr>
                <th>Judul Kajian</th>
                <th>Isi Kajian</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($kajian_hadist as $kajian) : ?>
                <tr>
                    <td><?= $kajian['judul_kajian']; ?></td>
                    <td><?= substr($kajian['isi_kajian'], 0, 100); ?>...</td>
                    <td>
                        <button class="btn btn-info btn-sm viewData" data-id="<?= $kajian['id_kajian']; ?>">Lihat</button>
                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal<?= $kajian['id_kajian']; ?>">Edit</button>
                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal<?= $kajian['id_kajian']; ?>">Hapus</button>
                    </td>
                </tr>

                <!-- Modal Lihat Data -->
                <div class="modal fade" id="viewModal<?= $kajian['id_kajian']; ?>" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="viewModalLabel">Detail Kajian</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h5><?= $kajian['judul_kajian']; ?></h5>
                                <p><?= $kajian['isi_kajian']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Edit -->
                <div class="modal fade" id="editModal<?= $kajian['id_kajian']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit Kajian</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url('profile/edit_kajian/' . $kajian['id_kajian']); ?>" method="post">
                                    <div class="form-group">
                                        <label for="judul_kajian">Judul Kajian</label>
                                        <input type="text" class="form-control" id="judul_kajian" name="judul_kajian" value="<?= $kajian['judul_kajian']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="isi_kajian">Isi Kajian</label>
                                        <textarea class="form-control" id="editor1<?= $kajian['id_kajian']; ?>" name="isi_kajian" rows="5" required><?= htmlspecialchars($kajian['isi_kajian']); ?></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>



                <!-- Modal Hapus -->
                <div class="modal fade" id="deleteModal<?= $kajian['id_kajian']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Anda yakin ingin menghapus kajian ini?</p>
                            </div>
                            <div class="modal-footer">
                                <a href="<?= base_url('profile/hapus_kajian/' . $kajian['id_kajian']); ?>" class="btn btn-danger">Hapus</a>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function() {
        // Tampilkan daftar kajian saat tombol diklik
        $('#lihatDaftar').on('click', function() {
            $('#daftarKajian').toggle(); // Menampilkan atau menyembunyikan daftar
        });

        $('.viewData').on('click', function() {
            var id = $(this).data('id');
            $('#viewModal' + id).modal('show'); // Tampilkan modal lihat data
        });

        // Inisialisasi CKEditor pada modal edit saat modal ditampilkan
        $('.btn-warning').on('click', function() {
            var id = $(this).data('id');
            CKEDITOR.replace('editor1' + id, {
                filebrowserImageBrowseUrl: '<?php echo base_url('assets/kcfinder'); ?>',
                filebrowserUploadUrl: '<?php echo base_url('assets/kcfinder'); ?>',
                filebrowserImageUploadUrl: '<?php echo base_url('assets/kcfinder/upload.php?type=images'); ?>'
            });
        });
    });
</script>




</div>
<!-- End of Main Content -->