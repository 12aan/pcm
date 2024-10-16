<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Role</th>
                                    <th class="text-center" scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($role as $r) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $r['role']; ?></td>
                                        <td class="text-center">
                                            <a href="<?php echo base_url('admin/roleaccess/') . $r['id']; ?>">
                                                <i class="fas fa-key" data-toggle="tooltip" title="Access" style="color: #3498db; margin-right: 5px;"></i>
                                            </a>

                                            <a href="#" class="fas fa-edit" data-toggle="modal" title="Edit Name Role" data-target="#editRoleModal<?= $r['id']; ?>"></a>
                                        </td>
                                        <!-- Modal untuk setiap role -->
                                        <div class="modal fade" id="editRoleModal<?= $r['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editRoleModalLabel<?= $r['id']; ?>" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editRoleModalLabel<?= $r['id']; ?>">Edit Role</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="<?= base_url('admin/role'); ?>" method="post">
                                                        <div class="modal-body">
                                                            <input type="hidden" name="id" value="<?= $r['id']; ?>">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" name="role" value="<?= $r['role']; ?>" placeholder="Role name">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">


        <div class="col-lg-6 mb-4">



        </div>
    </div>

</div>


<!-- Content Row -->
</div>