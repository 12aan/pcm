<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Kelola Konten</h1>

    <!-- Kategori Selection -->
    <div class="row">
        <div class="col-lg-4">
            <select class="form-control mb-3" id="kategori" onchange="location = this.value;">
                <option value="<?php echo base_url('konten/derita'); ?>" <?php echo empty($kategori_terpilih) ? 'selected' : ''; ?>>Pilih Kategori</option>
                <?php foreach ($kategori as $kat) : ?>
                    <option value="<?php echo base_url('konten/derita/' . $kat['id_kategori']); ?>"
                        <?php echo isset($kategori_terpilih) && $kategori_terpilih == $kat['id_kategori'] ? 'selected' : ''; ?>>
                        <?php echo $kat['nama_kategori']; ?>
                    </option>
                <?php endforeach; ?>
            </select>


        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?php echo base_url('konten/tambah_data_konten'); ?>" class="btn btn-primary mt-2">Tambah Data</a>
            <div class="row">
                <div class="col-lg-8 mt-3">
                    <?= $this->session->flashdata('message'); ?>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th style="white-space: nowrap;">Tanggal</th>
                            <th>Judul</th>
                            <th>Gambar</th>
                            <th>Kategori</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($konten)) : ?>
                            <?php $nomor = 1; ?>
                            <?php foreach ($konten as $row) : ?>
                                <tr>
                                    <td><?php echo $nomor++; ?></td>
                                    <td style="white-space: nowrap;"><?php echo date('d-m-Y', strtotime($row['tanggal_posting'])); ?></td>
                                    <td>
                                        <span title="<?php echo $row['judul']; ?>">
                                            <?php echo substr($row['judul'], 0, 60); ?><?php echo (strlen($row['judul']) > 60) ? '...' : ''; ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php if (!empty($row['gambar'])) : ?>
                                            <?php $file_extension = pathinfo($row['gambar'], PATHINFO_EXTENSION); ?>
                                            <?php if (in_array($file_extension, ['jpg', 'jpeg', 'png', 'gif'])) : ?>
                                                <img src="<?php echo base_url('uploads/' . $row['gambar']); ?>" alt="gambar" width="50">
                                            <?php elseif ($file_extension === 'pdf') : ?>
                                                <embed src="<?php echo base_url('uploads/' . $row['gambar']); ?>" type="application/pdf" width="50" height="50">
                                            <?php else : ?>
                                                <a href="<?php echo base_url('uploads/' . $row['gambar']); ?>" target="_blank"><?php echo $row['gambar']; ?></a>
                                            <?php endif; ?>
                                        <?php else : ?>
                                            <span>Tidak ada Gambar</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?= $row['nama_kategori']; ?></td>
                                    <td class="text-center">
                                        <a href="<?php echo base_url('konten/edit_data_konten/' . $row['id_konten']); ?>" style="color: #3498db; margin-right: 10px;">
                                            <i class="fas fa-edit" data-toggle="tooltip" title="Edit Data"></i>
                                        </a>
                                        <a href="<?php echo base_url('konten/hapus_data_konten/' . $row['id_konten']); ?>" onclick="return confirm('Yakin ingin menghapus data ini?');" style="color: #e74c3c;">
                                            <i class="fas fa-trash" data-toggle="tooltip" title="Hapus Data"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="5">Tidak ada data konten.</td>
                            </tr>
                        <?php endif; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
</div>
<!-- /.container-fluid -->