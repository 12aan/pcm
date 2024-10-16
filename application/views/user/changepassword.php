<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 font-weight-bold text-primary"><?= $title; ?></h1>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-6">
            <!-- Flash Message -->
            <?= $this->session->flashdata('message'); ?>

            <!-- Form Card -->
            <div class="card border-0 shadow-lg" style="border-radius: 15px;">
                <div class="card-header bg-gradient-primary text-white py-4" style="border-radius: 15px 15px 0 0;">
                    <h6 class="m-0 font-weight-bold">
                        <i class="fas fa-key mr-2"></i>Change Your Password
                    </h6>
                </div>
                <div class="card-body p-5">
                    <form action="<?= base_url('user/changepassword'); ?>" method="post">
                        <div class="form-group">
                            <label for="current_password" class="font-weight-bold">Current Password</label>
                            <input type="password" class="form-control form-control-lg" id="current_password" name="current_password" placeholder="Enter current password">
                            <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="new_password1" class="font-weight-bold">New Password</label>
                            <input type="password" class="form-control form-control-lg" id="new_password1" name="new_password1" placeholder="Enter new password">
                            <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="new_password2" class="font-weight-bold">Repeat Password</label>
                            <input type="password" class="form-control form-control-lg" id="new_password2" name="new_password2" placeholder="Repeat new password">
                            <?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group text-center mt-4">
                            <button type="submit" class="btn btn-lg btn-gradient-primary text-white" style="border-radius: 50px; padding: 10px 30px; background: linear-gradient(to right, #6a11cb, #2575fc); transition: all 0.3s ease;">
                                <i class="fas fa-save mr-2"></i> Change Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->


</div>
<!-- End of Main Content -->