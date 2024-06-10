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

    if (isset($_POST['submit'])) {
      $id_anggota = $_POST['id_anggota'];
      $nama = $_POST['nama'];
      $gender = $_POST['gender'];
      $jurusan = $_POST['jurusan'];
      $prodi = $_POST['prodi'];
      $jenis = $_POST['jenis'];
      $email = $_POST['email'];
      $notelp = $_POST['notelp'];
  
      $check_query = "SELECT * FROM data_anggota WHERE id_anggota='$id_anggota'";
      $check_result = $db->query($check_query);
  
      // Mengecek keberadaan ID
      if ($check_result->num_rows > 0) {
          // ID sudah ada, tampilkan pesan
          echo "Maaf, ID Anggota sudah ada.";
      } else {
          // ID belum ada, lanjutkan proses penyimpanan
          $insertquery = "INSERT INTO data_anggota (id_anggota, nama, gender, jurusan, prodi, jenis, email, notelp) VALUES ('$id_anggota','$nama','$gender', '$jurusan', '$prodi', '$jenis', '$email', '$notelp')";
          
          // Cek apakah query sukses atau gagal
          if ($db->query($insertquery) === TRUE) {
              header("Location: data-anggota.php"); //redirect
              exit;
          } else {
              echo "Data gagal disimpan " . $db->error;
          }
      }
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
                      <p class="card-title mb-0">Tambah Anggota</p>
                    </div>
                    <div class="col-md-6 text-md-right">
                      <a href="data-anggota.php" class="btn btn-success">Daftar Anggota</a>
                    </div>
                  </div>
                  <br>
                  <form class="forms-sample" method="post">
                    <div class="form-group">
                      <label for="id_anggota">ID Anggota</label>
                      <input type="text" class="form-control" id="id_anggota" name="id_anggota" placeholder="ID Anggota" required>
                    </div>
                    <div class="form-group">
                      <label for="nama">Nama</label>
                      <input type="text" class="form-control" id="nama" name="nama"  placeholder="Nama" required>
                    </div>
                    <div class="form-group">
                          <label for="gender">Jenis Kelamin</label>
                          <select class="form-control" id="gender" name="gender" required>
                              <option value="L">Laki-Laki</option>
                              <option value="P">Perempuan</option>
                          </select>
                    </div>

                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select class="form-control" id="jurusan" name="jurusan" onchange="updateProdiOptions()">
                            <option value="Teknologi Informasi">Teknologi Informasi</option>
                              <option value="Teknik Mesin">Teknik Mesin</option>
                              <option value="Teknik Sipil">Teknik Sipil</option>
                              <option value="Teknik Elektro">Teknik Elektro</option>
                              <option value="Akuntansi">Akuntansi</option>
                              <option value="Administrasi Niaga">Administrasi Niaga</option>
                              <option value="Bahasa Inggris">Bahasa Inggris</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="prodi">Prodi</label>
                        <select class="form-control" id="prodi" name="prodi">
                            <!-- Options -->
                        </select>
                    </div>


                      <script>
                          function updateProdiOptions() {
                              var jurusanSelect = document.getElementById("jurusan");
                              var prodiSelect = document.getElementById("prodi");
                              prodiSelect.innerHTML = "";

                              var selectedJurusan = jurusanSelect.value;
                              var prodiOptions;

                              switch (selectedJurusan) {
                                  case "Teknologi Informasi":
                                      prodiOptions = ["D3-Manajemen Informatika", "D3-Teknik Komputer", "D4-Teknik Rekayasa Perangkat Lunak"];
                                      break;
                                  case "Teknik Mesin":
                                      prodiOptions = ["D3-Teknik Mesin", "D3-Teknik Alat Berat", "D4-Teknik Manufaktur"];
                                      break;
                                  case "Teknik Sipil":
                                      prodiOptions = ["D3-Teknik Sipil", "D4-Teknik Perencanaan Irigasi dan Rawa", "D4-Manajemen Rekayasa Konstruksi","D4-Perancangan Jalan dan Jembatan"];
                                      break;
                                  case "Teknik Elektro":
                                      prodiOptions = ["D3-Teknik Listrik", "D3-Teknik Elektronika", "D3-Teknik Telekomunikasi","D4-Teknik Elektronika","D4-Teknik Telekomunikasi"];
                                      break;
                                  case "Akuntansi":
                                      prodiOptions = ["D3-Akuntansi", "D4-Akuntansi"];
                                      break;
                                  case "Administrasi Niaga":
                                      prodiOptions = ["D3-Administrasi Bisnis", "D3-Usaha Perjalanan Wisata", "D4-Destinasi Pariwisata"];
                                      break;
                                  case "Bahasa Inggris":
                                      prodiOptions = ["D3-Bahasa Inggris", "D4-Bahasa Inggris untuk Komunikasi Bisnis dan Profesional"];
                                      break;
                                  // Tambahkan kasus lain jika diperlukan
                                  default:
                                      prodiOptions = [];
                                      break;
                              }

                              prodiOptions.forEach(function (prodi) {
                                  var option = document.createElement("option");
                                  option.value = prodi;
                                  option.text = prodi;
                                  prodiSelect.add(option);
                              });
                          }

                          window.onload = updateProdiOptions;
                      </script>
                      <div class="form-group">
                          <label for="jenis">Jenis</label>
                          <select class="form-control" id="jenis" name="jenis" required>
                              <option value="Mahasiswa">Mahasiswa</option>
                              <option value="Dosen">Dosen</option>
                              <option value="Pegawai">Pegawai</option>
                          </select>
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="text" class="form-control" id="email" name="email"  placeholder="Email" required>
                    </div>
                    <div class="form-group">
                      <label for="notelp">No Telp</label>
                      <input type="text" class="form-control" id="notelp" name="notelp"  placeholder="No Telepon" required>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" name="submit" value="submit">Submit</button>
                    <button class="btn btn-light" href="input-anggota.php">Cancel</button>
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

