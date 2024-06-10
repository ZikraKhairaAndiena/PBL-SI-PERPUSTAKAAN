<?php
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

if (isset($_POST['submit'])) {
    $issn = $_POST['issn'];
    $judul = $_POST['judul'];
    $pengarang_id = $_POST['pengarang_id'];
    $penerbit_id = $_POST['penerbit_id'];
    $thn_terbit = $_POST['thn_terbit'];
    $kategori_id = $_POST['kategori_id'];
    $jumlah = $_POST['jumlah'];
    $tersedia = $_POST['tersedia'];
    $asal = $_POST['asal'];
    $tgl_input = $_POST['tgl_input'];

    $cover = '';
    if (isset($_FILES['gambar']['tmp_name']) && !empty($_FILES['gambar']['tmp_name'])) {
        $gambar_name = $_FILES['gambar']['name'];
        $gambar_tmp = $_FILES['gambar']['tmp_name'];

        // Sesuaikan folder tempat gambar disimpan
        $folder_path = "gambar_buku/";

        // Sesuaikan path gambar dengan nama folder dan nama file
        $cover = $folder_path . $gambar_name;

        move_uploaded_file($gambar_tmp, $cover);
    }

    // Query INSERT dengan penanganan nilai gambar
    $query = "INSERT INTO data_buku (issn, judul, pengarang_id, penerbit_id, thn_terbit, kategori_id, jumlah, tersedia, asal, tgl_input, gambar) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $db->prepare($query);

    // Bind parameters ssiisiisss
    $stmt->bind_param("ssiisiiisss", $issn, $judul, $pengarang_id, $penerbit_id, $thn_terbit, $kategori_id, $jumlah, $tersedia, $asal, $tgl_input, $cover);

    // Execute the statement
    if ($stmt->execute()) {
        header("Location: data-buku.php");
    } else {
        echo "Data Gagal Disimpan: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
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
  <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
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
            <a class="nav-link" data-toggle="collapse"  aria-expanded="false" href="#ui-basic" aria-controls="ui-basic">
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
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                      <div class="col-md-6">
                        <p class="card-title mb-0">Tambah Buku</p>
                      </div>
                      <div class="col-md-6 text-md-right">
                        <a href="data-buku.php" class="btn btn-success">Daftar Buku</a>
                      </div>
                    </div>
                    <br>
                  <form class="forms-sample" action="input-buku.php" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                      <label for="issn">ISSN</label>
                      <input type="text" class="form-control" id="issn" name="issn"  placeholder="ISSN">
                    </div>
                    <div class="form-group">
                      <label for="judul">Judul</label>
                      <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul">
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-6">
                          <p class="control-label">Pengarang</p>
                        </div>
                        <div class="col-md-6 text-md-right">
                          <a href="pengarang.php" class="btn btn-danger btn-sm">+ Tambah</a>
                        </div>
                      </div>
                      <br>
                        <select class="form-control" name="pengarang_id">
                          <option value="">Pilih Pengarang</option>
                              <?php
                                  $pengarang = mysqli_query($db, "SELECT * FROM pengarang");
                                  while($data_pengarang = mysqli_fetch_assoc($pengarang)) {
                                      echo "<option value=".$data_pengarang['id'].">".$data_pengarang['nama_pengarang']."</option>";
                                  }
                              ?>
                          </select>
                    </div>
                    <div class="form-group">
                      <div class="row">
                          <div class="col-md-6">
                            <p class="control-label">Penerbit</p>
                          </div>
                          <div class="col-md-6 text-md-right">
                            <a href="penerbit.php" class="btn btn-danger btn-sm">+ Tambah</a>
                          </div>
                        </div>
                        <br>
                        <select class="form-control" name="penerbit_id">
                          <option value="">Pilih Penerbit</option>
                              <?php
                                  $penerbit = mysqli_query($db, "SELECT * FROM penerbit");
                                  while($data_penerbit = mysqli_fetch_assoc($penerbit)) {
                                      echo "<option value=".$data_penerbit['id'].">".$data_penerbit['nama_penerbit']."</option>";
                                  }
                              ?>
                          </select>
                    </div>
                    <div class="form-group">
                      <label for="thn_terbit">Tahun Terbit</label>
                      <input type="text" class="form-control" id="thn_terbit" name="thn_terbit"  placeholder="Tahun Terbit">
                    </div>
                    <div class="form-group">
                      <div class="row">
                          <div class="col-md-6">
                            <p class="control-label">Kategori</p>
                          </div>
                          <div class="col-md-6 text-md-right">
                            <a href="kategori.php" class="btn btn-danger btn-sm">+ Tambah</a>
                          </div>
                        </div>
                        <br>
                        <select class="form-control" name="kategori_id">
                          <option value="">Pilih Kategori</option>
                              <?php
                                  $kategori = mysqli_query($db, "SELECT * FROM kategori");
                                  while($data_kategori = mysqli_fetch_assoc($kategori)) {
                                      echo "<option value=".$data_kategori['id'].">".$data_kategori['nama_kategori']."</option>";
                                  }
                              ?>
                          </select>
                    </div>
                    <div class="form-group">
                      <label for="jumlah">Jumlah</label>
                      <input type="text" class="form-control" id="jumlah" name="jumlah"  placeholder="Jumlah">
                    </div>
                    <div class="form-group">
                      <label for="tersedia">Tersedia</label>
                      <input type="text" class="form-control" id="tersedia" name="tersedia"  placeholder="Tersedia">
                    </div>
                    <div class="form-group">
                        <label for="asal">Asal</label>
                        <select class="form-control" id="asal" name="asal">
                            <option value="Beli">Beli</option>
                              <option value="Sumbangan">Sumbangan</option>
                              <option value="Denda">Denda</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tgl_input" class="form-label">Tanggal Input</label><br>
                          <input name="tgl_input" type="text" id="tgl_input" class="form-control" autocomplete="off" value="<?php echo "".date("Y/m/d").""; ?>" readonly="readonly" />
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar</label><br>
                        <input type="file" name="gambar" accept="image/*"  required>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" name="submit" value="submit">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                  </div>
                </div>
              </div>
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
  <!-- <script src="js/bootstrap.bundle.min.js"></script> -->
</body>

</html>

