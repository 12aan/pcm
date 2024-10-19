<!-- SUB SUB NAVBAR BAWAH -->
<div class="page-body">
    <div class="container-xl">

        <div class="card">
            <div class="card-body">

                <section class="text-justify mt-4">
                    <div class="container">
                        <h2 class="text-center mb-4">SURAT AKTIF ORGANISASI</h2>
                        <hr class="my-4">

                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <p class="text-center">
                                    Assalamu'alaikum wr wb.<br>
                                    Disampaikan bagi Bapak/Ibu/Saudara yang memerlukan Surat Keterangan Aktif di Muhammadiyah dapat mengisi form di bawah ini:
                                </p>
                                <p class="text-center">
                                    Demikian, atas perhatiannya diucapkan terima kasih.<br>
                                    Wassalamu'alaikum wr wb.<br>
                                    <b>Ketua PCM Kasihan<br>H. Toto Budi Santoso</b>
                                </p>
                                <p class="text-center">
                                    Surat ini hanya diberikan kepada Anggota Muhammadiyah yang berdomisili di wilayah kerja PCM Kasihan.
                                </p>
                                <hr class="my-4">
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="text-center">FORMULIR SURAT AKTIF ORGANISASI</h4>
                                        <hr class="mt-2">

                                        <?php if ($this->session->flashdata('success')): ?>
                                            <div class="alert alert-success">
                                                <?php echo $this->session->flashdata('success'); ?>
                                            </div>
                                        <?php endif; ?>

                                        <?php if ($this->session->flashdata('error')): ?>
                                            <div class="alert alert-danger">
                                                <?php echo $this->session->flashdata('error'); ?>
                                            </div>
                                        <?php endif; ?>

                                        <form enctype="multipart/form-data" action="<?php echo site_url('adminor/surat_aktif_org'); ?>" method="post">
                                            <!-- Form elements -->
                                            <div class="mb-3">
                                                <label for="nama_lengkap" class="form-label">Nama</label>
                                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan nama lengkap anda" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email anda" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Tempat lahir anda" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="alamat_tinggal" class="form-label">Alamat Tinggal</label>
                                                <input type="text" class="form-control" id="alamat_tinggal" name="alamat_tinggal" placeholder="Masukkan alamat tinggal anda sekarang" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="no_hp" class="form-label">No. HP/WA</label>
                                                <input type="tel" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan nomer whatsapp/nomer yang dapat dihubungi" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="instansi_kerja" class="form-label">Instansi Kerja</label>
                                                <input type="text" class="form-control" id="instansi_kerja" name="instansi_kerja" placeholder="Masukkan instansi kerja anda" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="alamat_instansi_kerja" class="form-label">Alamat Instansi Kerja/Kantor</label>
                                                <input type="text" class="form-control" id="alamat_instansi_kerja" name="alamat_instansi_kerja" placeholder="Masukkan alamat kerja anda sekarang" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="telepon_kantor_kerja" class="form-label">Telepon Kantor/Instansi</label>
                                                <input type="tel" class="form-control" id="telepon_kantor_kerja" name="telepon_kantor_kerja" placeholder="Masukkan telepon kantor kerja anda" required>
                                            </div>

                                            <div class="mb-4">
                                                <label for="file_path_kartu_tanda_anggota" class="form-label">Upload Karu Tanda Anggota Muhammadiyah/Aisyiyah</label>
                                                <input type="file" class="form-control" id="file_path_kartu_tanda_anggota" name="file_path_kartu_tanda_anggota">
                                                <small id="gambarHelp" class="form-text text-muted">Pilih file (format: jpg, jpeg, png, pdf, dll).</small>
                                            </div>
                                            <div class="mb-4">
                                                <label for="file_path_bukti_keaktifan" class="form-label">Foto Bukti Keaktifan atau Surat Rekomendasi/Keterangan Takmir atau Surat Rekomendasi/Keterangan Lembaga/Majlis dimana yang bersangkutan (ybs) aktif
                                                </label>
                                                <input type="file" class="form-control" id="file_path_bukti_keaktifan" name="file_path_bukti_keaktifan" value="Not Avatar">
                                                <small id="gambarHelp" class="form-text text-muted">Pilih file (format: jpg, jpeg, png, pdf, dll).</small>
                                            </div>
                                            <hr>
                                            <button type="submit" class="btn btn-primary">KIRIM</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


            </div>
        </div>

    </div>
</div>
<!-- END OF SUB SUB NAVBAR BAWAH -->