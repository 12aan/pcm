<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 font-weight-bold text-primary"><?= $title; ?></h1>
    </div>

    <!-- Card Container -->
    <div class="card shadow-lg mb-4">
        <div class="card-header py-3 bg-primary text-white">
            <h6 class="m-0 font-weight-bold">Edit Profile</h6>
        </div>

        <div class="card-body">
            <?= form_open_multipart('user/edit'); ?>

            <!-- Form Email -->
            <div class="form-group row">
                <label for="email" class="col-md-2 col-form-label font-weight-bold text-dark">Email</label>
                <div class="col-md-10">
                    <input type="text" class="form-control-plaintext" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                </div>
            </div>

            <!-- Form Full Name -->
            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label font-weight-bold text-dark">Full Name</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>">
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <!-- Form Picture -->
            <div class="form-group row">
                <label class="col-md-2 col-form-label font-weight-bold text-dark">Picture</label>
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-sm-3 mb-3 mb-sm-0">
                            <img src="<?= base_url('assets12/img/profile/') . $user['image']; ?>" class="img-thumbnail rounded-circle border border-light shadow-sm" style="width: 100px; height: 100px; object-fit: cover;">
                        </div>
                        <div class="col-sm-9 d-flex align-items-center">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="form-group row justify-content-end">
                <div class="col-md-10">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" style="border-radius: 50px; padding: 10px 30px; background: linear-gradient(to right, #6a11cb, #2575fc);">
                        <i class="fas fa-save mr-2"></i> Update Profile
                    </button>
                </div>
            </div>

            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->


</div>
<!-- End of Main Content -->