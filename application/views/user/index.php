<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 font-weight-bold text-primary text-center"><?= $title; ?></h1>
    </div>

    <!-- Flash message -->
    <div class="row justify-content-center mb-3">
        <div class="col-12 col-md-10 col-lg-8">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <!-- Profile Card -->
    <div class="card mb-3 col-12 col-md-10 col-lg-8 mx-auto border-0 shadow-lg" style="border-radius: 15px;">
        <div class="row no-gutters">
            <!-- Profile Image Column -->
            <div class="col-md-4 d-flex align-items-center justify-content-center bg-light p-3" style="border-radius: 15px 0 0 15px;">
                <img src="<?= base_url('assets12/img/profile/') . $user['image']; ?>"
                    class="img-fluid rounded-circle border border-white shadow-sm"
                    alt="User Image" style="object-fit: cover; max-width: 160px;">
            </div>

            <!-- Profile Details Column -->
            <div class="col-md-8">
                <div class="card-body d-flex flex-column justify-content-center p-4 text-center text-md-left">
                    <h5 class="card-title font-weight-bold text-dark"><?= $user['name']; ?></h5>
                    <p class="card-text text-muted"><?= $user['email']; ?></p>
                    <p class="card-text">
                        <small class="text-muted">Member since <?= date('d F Y', $user['date_created']); ?></small>
                    </p>

                    <!-- Action Buttons -->
                    <div class="d-flex justify-content-center justify-content-md-start align-items-center mt-4 flex-wrap">
                        <a href="<?= base_url('user/edit'); ?>"
                            class="btn btn-lg btn-gradient-primary text-white mr-3"
                            style="border-radius: 50px; padding: 10px 30px; background: linear-gradient(to right, #6a11cb, #2575fc); transition: all 0.3s ease; min-width: 150px;">
                            <i class="fas fa-user-edit mr-2"></i> Edit Profile
                        </a>
                        <a href="<?= base_url('user/changepassword'); ?>"
                            class="btn btn-lg btn-outline-secondary"
                            style="border-radius: 50px; padding: 10px 30px; transition: all 0.3s ease; min-width: 150px;">
                            <i class="fas fa-key mr-2"></i> Change Password
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