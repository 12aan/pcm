<div class="page-body">
    <div class="container-xl">
        <div class="row row-deck row-cards">
            <div class="card">
                <div class="card-body">
                    <div class="container">


                        <div class="text-justify mt-4">

                            <h2>SURAT MASUK</h2>

                            <?php
                            // Balik urutan array
                            $surat_masuk_by_agenda_reversed = array_reverse($surat_masuk_by_agenda, true);
                            ?>
                            <?php foreach ($surat_masuk_by_agenda_reversed as $id_masuk => $surat_masuk_agenda) : ?>
                                <?php $agenda = $surat_masuk_agenda[0]['agenda']; ?>
                                <h5 class="mx-4"><?php echo $agenda; ?></h5>
                                <ul>
                                    <?php foreach ($surat_masuk_agenda as $row) : ?>
                                        <?php if (trim($row['nama_surat']) === 'Belum ada nama surat') continue; ?>
                                        <li class="mx-5">
                                            <?php $tanggal_formatted = date('d F Y', strtotime($row['tanggal'])); ?>
                                            <?php echo $tanggal_formatted; ?> - <?php echo $row['nama_surat']; ?>
                                            <?php if (!empty($row['file_path']) && file_exists('./uploads/' . $row['file_path'])) : ?>
                                                | <a href="<?php echo base_url('./uploads/' . $row['file_path']); ?>" target="_blank">Surat</a> |
                                            <?php endif; ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endforeach; ?>

                            <?php if (empty($surat_masuk_agenda)) : ?>
                                <p>Tidak ada data surat masuk.</p>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>