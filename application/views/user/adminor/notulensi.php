<div class="page-body">
    <div class="container-xl">
        <div class="row row-deck row-cards">
            <div class="card">
                <div class="card-body">

                    <div class="container">
                        <h2>NOTULENSI</h2>
                        <?php foreach ($surat_notulensi_by_agenda as $id_notulensi => $surat_notulensi_agenda) : ?>
                            <h5 class="mx-2"><?php echo $surat_notulensi_agenda[0]['agenda']; ?></h5>
                            <ol class="mx-4">
                                <?php foreach ($surat_notulensi_agenda as $row) : ?>
                                    <li>
                                        <div class="mx-2">
                                            
                                            <?php echo date('d-m-Y', strtotime($row['tanggal'])); ?> - <?php echo $row['nama_surat']; ?> | <a href="<?php echo base_url('./uploads/' . $row['file_path_undangan']); ?>" target="_blank">Undangan</a> | <a href="<?php echo base_url('./uploads/' . $row['file_path_notulensi']); ?>" target="_blank">Notulensi</a> |
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ol>
                        <?php endforeach; ?>

                        <?php if (empty($surat_notulensi_agenda)) : ?>
                            <p>Tidak ada data surat masuk.</p>
                        <?php endif; ?>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>