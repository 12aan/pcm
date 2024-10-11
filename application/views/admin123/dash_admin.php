<!DOCTYPE html>
<html lang="en">

<body>
    <script src="<?php echo base_url('assets/static/js/initTheme.js') ?>"></script>
    <div id="app">

        <!-- Batas Sidebar -->

        <div id="main-content">
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>SELAMAT DATANG, <?php echo $this->session->userdata('admin_name'); ?></h3>

                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/admin/') ?>">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <section class="section py-5">
                    <div class="container">
                        <div class="card shadow-lg border-0 rounded-lg">
                            <div class="card-header bg-primary text-white">
                                <h4 class="card-title mb-0">Dashboard Statistics</h4>
                            </div>
                            <br>
                            <div class="card-body">
                                <div class="row text-center">
                                    <div class="col-md-6 col-lg-4 mb-4">
                                        <div class="card shadow-sm border-0 rounded-lg bg-light">
                                            <div class="card-body py-4 d-flex flex-column align-items-center">
                                                <i class="bi bi-person-circle fs-3 text-primary mb-3"></i>
                                                <h5 class="card-title mb-1">Total Visitors</h5>
                                                <p class="card-text fs-3 fw-bold text-dark"><?php echo $total_visitors; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 mb-4">
                                        <div class="card shadow-sm border-0 rounded-lg bg-light">
                                            <div class="card-body py-4 d-flex flex-column align-items-center">
                                                <i class="bi bi-chat-text fs-3 text-success mb-3"></i>
                                                <h5 class="card-title mb-1">Total Comments</h5>
                                                <p class="card-text fs-3 fw-bold text-dark"><?php echo $total_comments; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>




            </div>
        </div>



    </div>
    <!-- Make sure to include Bootstrap Icons or FontAwesome if you're using these icons -->
    <!-- Make sure to include Bootstrap Icons or FontAwesome if you're using these icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <!-- Add Bootstrap CSS if not already included -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <script src="<?php echo base_url('/assets/static/js/components/dark.js') ?>"></script>
    <script src="<?php echo base_url('/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') ?>"></script>

    <script src="<?php echo base_url('/assets/compiled/js/app.js') ?>"></script>


</body>

</html>