<!-- SUB SUB NAVBAR BAWAH -->
<div class="page-body">
    <div class="container-xl">

        <div class="card">
            <div class="card-body">

                <div class="text-justify mt-2">
                    <div class="container">
                        <div class="mx-2 mt-4">
                            <?php foreach ($artikel as $a) : ?>
                                <h1><?php echo $a['judul_artikel']; ?></h1>
                                <p><?php echo $a['isi_artikel']; ?></p>

                            <?php endforeach; ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>