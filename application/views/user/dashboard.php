        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Anggota</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $this->ModelUser->getUserWhere(['role_id' => 2])->num_rows(); ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-list-ul fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Stok Buku Ready</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php
                          $where = ['stok != 0'];
                          $totalstok = $this->ModelBuku->total('stok',$where);
                          echo $totalstok;
                        ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-spinner fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Dipinjam</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php
                          $where = ['dipinjam != 0'];
                          $totaldipinjam = $this->ModelBuku->total('dipinjam',$where);
                          echo $totaldipinjam;
                        ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Dibooking</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php
                          $where = ['dibooking !=0'];
                          $totaldibooking = $this->ModelBuku->total('dibooking', $where);
                          echo $totaldibooking;
                        ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-times fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
        </div>