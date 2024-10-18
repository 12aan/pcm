<!-- SUB SUB NAVBAR BAWAH -->
<div class="page-body d-flex">
    <div class="container-xl">
        <div class="card">
            <div class="card-body">
                <div class="text-justify mt-2">
                    <div class="container">
                        <div class="mx-2 mt-4">
                            <h1>PUSTAKA</h1>
                            <h4>Merupakan perpustakaan online yang bisa dibaca, terdiri dari scaning buku-buku pustaka koleksi PCM, dan di download dengan tetap memperhatikan hak cipta dan penerbitan.</h4>
                            <?php $counter = 1; ?>
                            <?php foreach ($pustaka as $item) : ?>
                                <div class="news-content d-flex align-items-start">
                                    <!-- Kontainer besar untuk nomor urut dan judul -->
                                    <p class="card-text"><?php echo $counter++; ?>. &nbsp; <?php echo $item['judul_pustaka']; ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END OF SUB SUB NAVBAR BAWAH -->
<!-- SUB SUB NAVBAR BAWAH -->