<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Selamat Datang, <?= $user['name']; ?></h1>
    </div>

    <!-- Selamat Datang Admin in Card -->
    <div class="col-14 mb-4">
      <div class="card shadow h-100 py-2">
        <div class="card-body">
          <h2 class="h5 mb-0 text-gray-800" style="border-bottom: 2px solid #4e73df; padding-bottom: 10px;">DASHBOARD</h2>

          <!-- Content inside the card for Total Visitor and Total Comments -->
          <div class="row mt-4">

            <!-- Total Visitor -->
            <div class="col-xl-6 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Visitor</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $total_visitors; ?></div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Total Comments -->
            <div class="col-xl-6 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Comments</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_comments; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>


    <!-- Content Row -->


    <!-- Content Row -->
    <div class="row">


      <div class="col-lg-6 mb-4">



      </div>
    </div>

  </div>
  <!-- /.container-fluid -->
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->