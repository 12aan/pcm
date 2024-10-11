<!-- SUB SUB NAVBAR BAWAH -->
<div class="page-body">
    <div class="container-xl">
        <div class="row row-deck row-cards">
            <div class="card">
                <div class="card-body">

                    <div class="container">
                        <h4>DAFTAR DAN SERTIFIKAT WAKAF</h4>
                        <?php foreach ($sertifikat_wakaf as $row) : ?>
                            <ul>
                                <li><?php echo $row['nama_surat_wakaf']; ?> <a href="<?php echo base_url('./uploads/' . $row['file_path_sertifikat_wakaf']); ?>"><?php echo $row['nama_masjid']; ?></a></li>
                            </ul>
                        <?php endforeach; ?>
                        <?php if (empty($sertifikat_wakaf)) : ?>
                            <p>Tidak ada data surat masuk.</p>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- END OF SUB SUB NAVBAR BAWAH -->