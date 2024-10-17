<div class="page-body">
    <div class="container-xl">
        <div class="row row-deck row-cards">
            <div class="card">
                <div class="card-body">

                    <div class="container">
                        <div class="text-justify mt-4">
                            <h2>SURAT KELUAR</h2>
                           
                            <?php foreach ($surat_keluar_by_agenda as $id_keluar => $surat_keluar_agenda) : ?>
                                <h5 class="mx-4"><?php echo $surat_keluar_agenda[0]['agenda']; ?></h5>
                                <ul class="mx-5">
                                    <?php foreach ($surat_keluar_agenda as $row) : ?>
                                        <li>
                                            <?php $tanggal_formatted = date('d F Y', strtotime($row['tanggal'])); ?>
                                            <?php echo $tanggal_formatted; ?> - <?php echo $row['nama_surat']; ?>
                                            <?php if (!empty($row['file_path_surat']) && file_exists('./uploads/' . $row['file_path_surat'])) : ?>
                                                | <a href="<?php echo base_url('./uploads/' . $row['file_path_surat']); ?>" target="_blank">Surat</a>
                                            <?php endif; ?>
                                            <?php if (!empty($row['file_path_undangan']) && file_exists('./uploads/' . $row['file_path_undangan'])) : ?>
                                                | <a href="<?php echo base_url('./uploads/' . $row['file_path_undangan']); ?>" target="_blank">Daftar Undangan</a>
                                            <?php endif; ?>
                                            <?php if (!empty($row['file_path_photo']) && file_exists('./uploads/' . $row['file_path_photo'])) : ?>
                                                | <a href="<?php echo base_url('./uploads/' . $row['file_path_photo']); ?>" target="_blank">Photo</a>
                                            <?php endif; ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endforeach; ?>


                            <?php if (empty($surat_keluar_agenda)) : ?>
                                <p>Tidak ada data surat masuk.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>