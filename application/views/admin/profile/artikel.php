<!-- Form Tambah Kajian Hadist -->
<div class="container-fluid">
    <h4>Tambah Artikel</h4>
    <form action="<?= base_url('profile/upload_kajian'); ?>" method="post">
        <div class="form-group">
            <label for="judul_artikel">Judul Artikel</label>
            <input type="text" class="form-control" id="judul_artikel" name="judul_artikel" required>
        </div>
        <div class="form-group">
            <label for="isi_artikel">Isi Artikel</label>
            <textarea class="form-control" id="editor1" name="isi_artikel" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Artikel</button>
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
    <div>
        <button id="lihatDaftar" class="btn btn-success">Lihat Daftar Artikel</button>
    </div>
    <!-- Daftar Kajian Hadist (Awalnya disembunyikan) -->
    <div id="daftarKajian" class="mt-4" style="display: none;">

        <!-- Begin Page Content -->
        <div class="">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Daftar Artikel</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">

                    <div class=" row">
                        <div class="col-lg-8 mt-3">
                            <?= $this->session->flashdata('message'); ?>
                        </div>
                    </div>
                </div>

                <div class="card-body ">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th>Isi Artikel</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($artikel as $a) : ?>
                                    <tr>
                                        <td>
                                            <?php
                                            // Split the title into words
                                            $words = explode(' ', $a['judul_artikel']);
                                            // Show up to 5 words, or the full title if it's shorter
                                            $limitedTitle = implode(' ', array_slice($words, 0, 5)) . (count($words) > 5 ? '...' : '');
                                            ?>
                                            <?= $limitedTitle; ?>
                                        </td>
                                        <td>
                                            <?php
                                            // Limit content to 10 words
                                            $words = explode(' ', $a['isi_artikel']);
                                            $limitedContent = implode(' ', array_slice($words, 0, 10)) . (count($words) > 10 ? '...' : '');
                                            ?>
                                            <span data-toggle="tooltip" title="<?= htmlspecialchars($a['isi_artikel']); ?>">
                                                <?= $limitedContent; ?>
                                            </span>
                                        </td>
                                        <td>
                                            <div class="action-icons" style="display: flex; align-items: center; justify-content: center;">
                                                <a href="<?php echo base_url('profile/edit_artikel/'); ?>" style="color: #3498db; margin-right: 10px;" class="fas fa-edit"></a>
                                                <a href="<?php echo base_url('profile/'); ?>" style="color: #e74c3c;" class="fas fa-trash"></a>
                                            </div>
                                        </td>

                                    </tr>

                                    <!-- Modal Lihat Data -->
                                    <div class="modal fade" id="viewModal<?= $a['id_kajian']; ?>" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="viewModalLabel">Detail Artikel</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h5><?= $a['judul_artikel']; ?></h5>
                                                    <p><?= $a['isi_artikel']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php endforeach; ?>
                            </tbody>
                        </table>

                        <!-- Initialize Bootstrap tooltip -->
                        <script>
                            $(document).ready(function() {
                                $('[data-toggle="tooltip"]').tooltip();
                            });
                        </script>


                        <script>
                            $(document).ready(function() {
                                $('[data-toggle="tooltip"]').tooltip();
                            });
                        </script>


                    </div>
                </div>
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
    </div>
</div>
</div>
<!-- /.container-fluid -->

<!--inininini-->