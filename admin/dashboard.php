<?php
    // Panggil koneksi
    session_start();
    require '../koneksi.php';

    // Ambil username dari sesi
    $username = $_SESSION['username'];

    // Query untuk mengambil nama dari tabel admin berdasarkan username
    $query = "SELECT nama1 FROM admin WHERE username = '$username'";

    try {
        $result = $db->query($query);

        // Periksa apakah query berhasil dieksekusi
        if ($result) {
            // Ambil data nama dari hasil query
            $userData = $result->fetch_assoc();

            // Periksa apakah hasil query mengembalikan data
            if ($userData) {
                $nama1 = $userData['nama1'];
            } else {
                echo "Data tidak ditemukan.";
            }
        } else {
            // Gagal eksekusi query
            throw new Exception("Query error: " . $db->error);
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Perpustakaan Politeknik Negeri Padang</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-...">

</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo mr-5" href="dashboard.php" style="margin-left: 15px;"><img src="images/pnp.png" class="mr-2" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="dashboard.php"><img src="images/logo_pnp.png" alt="logo"/></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                <img src="images/faces/person.png" alt="profile" style="margin-right: 5px; font-family: 'Poppins', sans-serif;"/>
                <?php echo $nama1; ?> 
            </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="logout.php">
                  <i class="ti-power-off text-primary"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
          </button>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme">
            <div class="img-ss rounded-circle bg-light border mr-3"></div>
            Light
          </div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme">
            <div class="img-ss rounded-circle bg-dark border mr-3"></div>
            Dark
          </div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Anggota</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="data-anggota.php">Data Anggota</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Buku</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="data-buku.php">Data Buku</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Sirkulasi</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="peminjaman.php">Peminjaman</a></li>
                <li class="nav-item"> <a class="nav-link" href="pengembalian.php">Pengembalian</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
              <i class="icon-grid-2 menu-icon"></i>
              <span class="menu-title">Pengunjung</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="data-pengunjung.php">Daftar Pengunjung</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Pengguna</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="data-pengguna.php">Data Pengguna</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">

                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <!-- <h3 class="font-weight-bold">Welcome  echo $nama; </h3> -->
                  <h3 class="font-weight-bold">Welcome <b><?php echo $nama1; ?></b></h3>
                </div>

            </div>
          </div>
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card tale-bg">
                <div class="card-people">
                  <img src="images/dashboard/gambar2.png" alt="people">
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin transparent">
              <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                  <a href="data-anggota.php" >
                    <div class="row">
                      <div class="card-body mx-3">
                        <p class="mb-4">Total Anggota</p>
                        <?php
                            $queryAnggota = "SELECT * FROM data_anggota ORDER BY id_anggota DESC";
                            $resultAnggota = $db->query($queryAnggota);
                            $totalAnggota = $resultAnggota->num_rows;
                          ?>
                          <p class="fs-30 mb-2"><?php echo $totalAnggota; ?></p>
                      </div>
                      <div class="card-body  d-flex">
                      <img src="images/user.png" alt="Gambar" width="77" height="78" class="ml-auto mr-2">
                      </div>
                  </div>
                  </a>
                  </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card card-tale">
                      <a href="data-buku.php" >
                      <div class="row">
                        <div class="card-body mx-3">
                          <p class="mb-4">Total Buku</p>
                          <?php
                                $queryBuku = "SELECT * FROM data_buku ORDER BY issn DESC";
                                $resultBuku = $db->query($queryBuku);
                                $totalBuku = $resultBuku->num_rows;
                              ?>
                              <p class="fs-30 mb-2"><?php echo $totalBuku; ?></p>
                        </div>
                        <div class="card-body  d-flex">
                      <img src="images/book.png" alt="Gambar" width="80" height="75" class="ml-auto mr-2">
                      </div>
                      </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                  <div class="card card-light-blue">
                  <a href="data-buku.php" >
                      <div class="row">
                        <div class="card-body mx-3">
                          <p class="mb-4">Peminjaman</p>
                          <?php
                                $queryBuku = "SELECT * FROM data_buku ORDER BY issn DESC";
                                $resultBuku = $db->query($queryBuku);
                                $totalBuku = $resultBuku->num_rows;
                              ?>
                              <p class="fs-30 mb-2"><?php echo $totalBuku; ?></p>
                        </div>
                        <div class="card-body  d-flex">
                      <img src="images/pinjam.png" alt="Gambar" width="80" height="75" class="ml-auto mr-2">
                      </div>
                      </div>
                      </a>
                  </div>
                </div>
                <div class="col-md-6 stretch-card transparent">
                  <div class="card card-light-danger">
                  <a href="data-pengunjung.php" >
                      <div class="row">
                        <div class="card-body mx-3">
                          <p class="mb-4">Pengunjung</p>
                          <?php
                                $queryKunjung = "SELECT * FROM pengunjung ORDER BY tgl_kunjung DESC";
                                $resultKunjung = $db->query($queryKunjung);
                                $totalKunjung = $resultKunjung->num_rows;
                              ?>
                              <p class="fs-30 mb-2"><?php echo $totalKunjung; ?></p>
                        </div>
                        <div class="card-body  d-flex">
                      <img src="images/group.png" alt="Gambar" width="80" height="75" class="ml-auto mr-2">
                      </div>
                      </div>
                      </a>
                  </div>
                </div>
              </div>
            </div>
          </div>

  <div class="row">
    <div class="col-md-5 grid-margin stretch-card">
      <div class="card">
          <div class="card-body">
                <h4 class="card-title">Pemberitahuan</h4>
                  <?php
                    $queryAnggota = "SELECT * FROM data_anggota ORDER BY id DESC LIMIT 1";
                    $resultAnggota = $db->query($queryAnggota);
                    while ($data2 = $resultAnggota->fetch_assoc()) {
                    ?>
                        <div class="alert alert-block alert-danger">
                            <button data-dismiss="alert" class="close close-sm" type="button">
                                <i class="fa fa-times"></i>
                            </button>
                            <strong><?php echo $data2['nama']; ?></strong>, Telah terdaftar menjadi anggota perpustakaan.
                        </div>
                    <?php } ?>

                    <?php
                    $queryAdmin = "SELECT * FROM admin ORDER BY user_id DESC LIMIT 1";
                    $resultAdmin = $db->query($queryAdmin);
                    while ($data3 = $resultAdmin->fetch_assoc()) {
                    ?>
                        <div class="alert alert-success">
                            <button data-dismiss="alert" class="close close-sm" type="button">
                                <i class="fa fa-times"></i>
                            </button>
                            <strong><?php echo $data3['nama1']; ?></strong>, Telah ditambahkan menjadi admin Perpustakaan yang baru.
                        </div>
                    <?php } ?>

                    <?php
                    $queryBuku = "SELECT * FROM data_buku ORDER BY id DESC LIMIT 1";
                    $resultBuku = $db->query($queryBuku);
                    while ($data4 = $resultBuku->fetch_assoc()) {
                    ?>
                        <div class="alert alert-info">
                            <button data-dismiss="alert" class="close close-sm" type="button">
                                <i class="fa fa-times"></i>
                            </button>
                            <strong><?php echo $data4['judul']; ?></strong>, Buku bacaan baru yang ada di Perpustakaan.
                        </div>
                    <?php } ?>

                    <?php
                    $queryPengunjung = "SELECT * FROM pengunjung ORDER BY id DESC LIMIT 1";
                    $resultPengunjung = $db->query($queryPengunjung);
                    while ($data5 = $resultPengunjung->fetch_assoc()) {
                    ?>
                        <div class="alert alert-warning">
                            <button data-dismiss="alert" class="close close-sm" type="button">
                                <i class="fa fa-times"></i>
                            </button>
                            <strong><?php echo $data5['nama']; ?> </strong> Pengunjung baru di PerPusWeb.
                        </div>
                    <?php } ?>
          </div>
        </div>
    </div>
    <!-- <div class="col-md-7">
    <div class="card">
                <div class="card-body">
                <h4 class="card-title">Pemberitahuan</h4>
                <?php
            $queryAnggota = "SELECT * FROM data_anggota ORDER BY id_anggota DESC LIMIT 3";
            $resultAnggota = $db->query($queryAnggota);
            while ($data1 = $resultAnggota->fetch_assoc()) {
            ?>
                <ul class="list-group teammates">
                    <li class="list-group-item">
                        <a href="data-anggota.php"><?php echo $data1['nama']; ?></a>
                    </li>
                </ul>
            <?php } ?>
            <div class="panel-footer bg-white">
                <a href="data-anggota.php" class="btn btn-sm btn-info">Data Anggota <i class="fa fa-plus"></i></a>
            </div>
                </div>
              </div>
    </div> -->
</div>
          </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>   
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023.<a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Perpustakaan Politeknik Negeri Padang<i class="ti-heart text-danger ml-1"></i></span>
          </div>
          <!-- <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Distributed by <a href="https://www.themewagon.com/" target="_blank">Themewagon</a></span> 
          </div> -->
        </footer> 
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <!-- <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/dataTables.select.min.js"></script> -->

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>

</html>

