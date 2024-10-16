<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <div class="card mb-3 col-lg-8 shadow-sm">
        <div class="row no-gutters">
            <div class="col-md-4 d-flex align-items-center justify-content-center">
                <!-- Menambahkan class img-fluid dan style untuk pengaturan posisi gambar -->
                <img src="<?= base_url('assets12/img/profile/') . $user['image']; ?>"
                    class="img-fluid rounded-circle border border-light"
                    alt="User Image"
                    style="object-fit: cover; width: 150px; height: 150px;">
            </div>
            <div class="col-md-8">
                <div class="card-body d-flex flex-column justify-content-center">
                    <h5 class="card-title font-weight-bold"><?= $user['name']; ?></h5>
                    <p class="card-text text-muted"><?= $user['email']; ?></p>
                    <p class="card-text">
                        <small class="text-muted">Member since <?= date('d F Y', $user['date_created']); ?></small>
                    </p>
                    <div class="d-flex justify-content-start align-items-center mt-3">
                        <a href="<?= base_url('user/edit'); ?>" class="btn btn-primary mr-2">
                            Edit Profile
                        </a>
                        <a href="<?= base_url('user/changepassword'); ?>" class="btn btn-outline-secondary">
                            Change Password
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>






</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->