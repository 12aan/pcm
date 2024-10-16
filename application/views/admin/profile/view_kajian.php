<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"><?= $kajian['judul_kajian'] ?></h4>
        </div>
        <div class="card-body">
            <p><?= $kajian['isi_kajian'] ?></p>
            <p><small><i>Dibuat pada: <?= date('d-m-Y H:i', strtotime($kajian['date_created'])) ?></i></small></p>
        </div>
    </div>
</div>