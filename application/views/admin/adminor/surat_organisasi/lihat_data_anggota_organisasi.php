<!-- Begin Page Content -->
<div class="container-fluid">


    <section class="section">
        <div class="card">
            <div class="card">
                <div class="card-body">
                    <div class="card-body">
                        <h4 class="card-title">DATA <?php echo $surat_aktif_organisasi['nama_lengkap']; ?> </h4>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <p>Nama Lengkap:</p>
                            </div>
                            <div class="col-md-8">
                                <p><?php echo $surat_aktif_organisasi['nama_lengkap']; ?></p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <p>Email:</p>
                            </div>
                            <div class="col-md-8">
                                <p><?php echo $surat_aktif_organisasi['email']; ?></p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <p>Tempat Lahir:</p>
                            </div>
                            <div class="col-md-8">
                                <p><?php echo $surat_aktif_organisasi['tempat_lahir']; ?></p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <p>Tanggal Lahir :</p>
                            </div>
                            <div class="col-md-8">
                                <p><?php echo $surat_aktif_organisasi['tanggal_lahir']; ?></p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <p>Alamat Tinggal Sekarang :</p>
                            </div>
                            <div class="col-md-8">
                                <p><?php echo $surat_aktif_organisasi['alamat_tinggal']; ?></p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <p>No Heandphone / WhatsApp :</p>
                            </div>
                            <div class="col-md-8">
                                <p><?php echo $surat_aktif_organisasi['no_hp']; ?></p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <p>Instansi Kerja :</p>
                            </div>
                            <div class="col-md-8">
                                <p><?php echo $surat_aktif_organisasi['instansi_kerja']; ?></p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <p>Alamat Instansi Kerja / Alamat Kantor : </p>
                            </div>
                            <div class="col-md-8">
                                <p><?php echo $surat_aktif_organisasi['alamat_instansi_kerja']; ?></p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <p>Nomer Telepon Instansi / Kantor : </p>
                            </div>
                            <div class="col-md-8">
                                <p><?php echo $surat_aktif_organisasi['telepon_kantor_kerja']; ?></p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <p>Foto Kartu Tanda Anggota Muhammadiyah/Aisyiyah</p>
                            </div>
                            <div class="col-md-8">
                                <?php
                                $file_path_kartu_tanda_anggota = $surat_aktif_organisasi['file_path_kartu_tanda_anggota'];
                                $file_extension = pathinfo($file_path_kartu_tanda_anggota, PATHINFO_EXTENSION);
                                if (in_array($file_extension, ['png', 'jpg', 'jpeg'])) {
                                    echo '<a href="' . base_url('./uploads/' . $file_path_kartu_tanda_anggota) . '" download><img src="' . base_url('./uploads/' . $file_path_kartu_tanda_anggota) . '" style="max-width:100%; max-height: 450px;" /></a>';
                                } else {
                                    echo '<embed src="' . base_url('./uploads/' . $file_path_kartu_tanda_anggota) . '" type="application/pdf" width="100%" height="600px" />';
                                }
                                ?>
                            </div>
                        </div>

                        <div class="row mb-8">
                            <div class="col-md-4">
                                <p style="text-align: justify; text-justify: inter-word;">
                                    Foto Bukti Keaktifan atau Surat Rekomendasi/Keterangan Takmir atau Surat Rekomendasi/Keterangan Lembaga/Majlis dimana yang bersangkutan (ybs) aktif
                                </p>
                            </div>
                            <div class="col-md-8">
                                <?php
                                $file_path_bukti_keaktifan = $surat_aktif_organisasi['file_path_bukti_keaktifan'];
                                $file_extension = pathinfo($file_path_bukti_keaktifan, PATHINFO_EXTENSION);
                                if (in_array($file_extension, ['png', 'jpg', 'jpeg'])) {
                                    echo '<a href="' . base_url('./uploads/' . $file_path_bukti_keaktifan) . '" download><img src="' . base_url('./uploads/' . $file_path_bukti_keaktifan) . '" style="max-width:100%; max-height: 450px;" /></a>';
                                } else {
                                    echo '<embed src="' . base_url('./uploads/' . $file_path_bukti_keaktifan) . '" type="application/pdf" width="100%" height="600px" />';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->