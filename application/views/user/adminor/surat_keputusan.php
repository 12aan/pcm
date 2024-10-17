<div class="page-body">
    <div class="container-xl">
        
        <div class="card">
            <div class="card-body">

                <div class="text-justify mt-4">
                    <div class="container">
                        <div class="mx-2 mt-4">
                            <h2>SURAT KEPUTUSAN</h2>

                            <?php foreach ($surat_keputusan_by_agenda as $id_keputusan => $surat_keputusan_agenda) : ?>
                                <h5 class="mx-4"><?php echo $surat_keputusan_agenda[0]['agenda']; ?></h5>
                                <ul>
                                    <?php foreach ($surat_keputusan_agenda as $row) : ?>
                                        <li class="mx-5">
                                            <?php if (!empty($row['file_path']) && file_exists('./uploads/' . $row['file_path'])) : ?>
                                                <a href="<?php echo base_url('./uploads/' . $row['file_path']); ?>" target="_blank"><?php echo $row['nama_surat']; ?></a>
                                            <?php else : ?>
                                                <a href="<?php echo base_url('not_found_file.txt'); ?>" target="_blank"><?php echo $row['nama_surat']; ?></a>
                                            <?php endif; ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endforeach; ?>



                            <?php if (empty($surat_keputusan_agenda)) : ?>
                                <p>Tidak ada data surat masuk.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>