<!-- Begin Page Content -->
<div class="container-fluid">

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Data Pustaka</h4>
            </div>
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <!-- Menampilkan tanggal saja dengan memformatnya -->
                        <input type="text" class="form-control" id="tanggal" name="tanggal" value="" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <!-- Mengganti input teks dengan textarea -->
                        <textarea class="form-control" id="judul" name="judul_pustaka" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Edit</button>
                </form>

            </div>
        </div>
    </section>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->