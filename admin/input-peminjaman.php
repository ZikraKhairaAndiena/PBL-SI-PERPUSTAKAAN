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
      $id = isset($_POST['id']) ? $_POST['id'] : '';
      $issn = $_POST['issn'];
      $id_anggota = $_POST['id_anggota'];     
      $tgl_pinjam = $_POST['tgl_pinjam'];      
      $status = $_POST['status'];
      $ket = isset($_POST['ket']) ? $_POST['ket'] : '';
      $count_result = null;

      // Prepared statement untuk mengambil jenis anggota
    $query_jenis_anggota = $db->prepare("SELECT jenis FROM data_anggota WHERE id_anggota = ?");
    $query_jenis_anggota->bind_param("s", $id_anggota);
    $query_jenis_anggota->execute();
    $result_jenis_anggota = $query_jenis_anggota->get_result();

      // $check_query = "SELECT * FROM trans_pinjam WHERE id='$id'";
      $count_query = "SELECT COUNT(*) AS jumlah_pinjaman FROM trans_pinjam WHERE id_anggota = '$id_anggota' AND status = 'pinjam'";
      $count_result = $db->query($count_query);

      if (!$count_result) {
        echo "Error in counting the number of borrowings: " . $db->error;
      } else {
          // Lanjutkan dengan logika pengolahan hasil query
      }
      if ($count_result) {
        $count_data = $count_result->fetch_assoc();
        $jumlah_pinjaman = $count_data['jumlah_pinjaman'];

        // Cek apakah anggota telah meminjam 3 buku
        if ($jumlah_pinjaman >= 3) {
            // echo "Maaf, anggota telah mencapai batas maksimal peminjaman (3 buku).";
            // exit;
            echo "<script>alert('Maaf, anggota telah mencapai batas maksimal peminjaman (3 buku).');</script>";
        } else {
          $query_jenis_anggota = "SELECT jenis FROM data_anggota WHERE id_anggota = '$id_anggota'";
          $result_jenis_anggota = $db->query($query_jenis_anggota);

            if ($result_jenis_anggota) {
              $data_jenis_anggota = $result_jenis_anggota->fetch_assoc();
              $jenis_anggota = $data_jenis_anggota['jenis'];
      
              // Hitung tanggal kembali berdasarkan jenis anggota
              if ($jenis_anggota === 'Dosen') {
                  $tgl_kembali = date("Y/m/d", strtotime($tgl_pinjam . " +30 days")); // Dosen: 30 hari
              } elseif ($jenis_anggota === 'Mahasiswa') {
                  $tgl_kembali = date("Y/m/d", strtotime($tgl_pinjam . " +7 days")); // Mahasiswa: 7 hari
              } else {
                  // Jenis anggota lainnya, sesuaikan logika atau atur nilai default
                  $tgl_kembali = date("Y/m/d", strtotime($tgl_pinjam . " +7 days")); // Nilai default: 7 hari
              }
            } else {
                // Gagal mendapatkan jenis anggota
                echo "Error: " . $db->error;
            }
           
            // Check availability of the book
    $availability_query = "SELECT tersedia FROM data_buku WHERE issn = '$issn'";
    $availability_result = $db->query($availability_query);

    if ($availability_result->num_rows > 0) {
        $book_data = $availability_result->fetch_assoc();
        $tersedia = $book_data['tersedia'];

        // Check if the book is available
        if ($tersedia > 0) {
            // Proceed with the transaction
            $insertquery = "INSERT INTO trans_pinjam (issn, id_anggota, tgl_pinjam, tgl_kembali, status, ket) VALUES ('$issn','$id_anggota', '$tgl_pinjam', '$tgl_kembali', '$status', '$ket')";

            // Cek apakah query sukses atau gagal
            if ($db->query($insertquery) === TRUE) {
                // Update the book availability
                $updatequery = "UPDATE data_buku SET tersedia = tersedia - 1 WHERE issn = '$issn'";
                if ($db->query($updatequery) === TRUE) {
                    // Redirect after a successful transaction
                    header("Location: peminjaman.php");
                    exit;
                } else {
                    echo "Error updating book availability: " . $db->error;
                }
            } else {
                echo "Data gagal disimpan " . $db->error;
            }
        } else {
            // Book is not available
            echo "Maaf, buku dengan ISSN '$issn' tidak tersedia.";
        }
    } else {
        // Error fetching book availability
        echo "Error fetching book availability: " . $db->error;
    }
        }
      } else {
          echo "Error in counting the number of borrowings: " . $db->error;
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
  <!-- <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css"> -->
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <!-- <<link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css"> -->
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
                      <p class="card-title mb-0">Tambah Peminjaman</p>
                    </div>
                    <div class="col-md-6 text-md-right">
                      <a href="peminjaman.php" class="btn btn-success">Daftar Peminjaman</a>
                    </div>
                  </div>
                  <form class="forms-sample" method="post">
                  <div class="form-group">
                      <label class=" control-label">ISSN</label>
                      <div class="col-sm-12">
                        <select class="form-control" name="issn" id="issn">
                        <option value=""> -- Pilih Salah Satu --</option>
                          <?php
                            $sql = $db->query("SELECT * FROM data_buku ORDER BY issn ASC");
                            if ($sql->num_rows != 0) {
                              while ($data = $sql->fetch_assoc()){
                                echo '<option value='.$data['issn'].'>'.$data['issn'].'</option>'; }                                
                          ?>
                        </select>
                      </div>
                    </div>
                    <?php }
                          ?>
                    <div class="form-group">
                      <label class="control-label">Judul Buku</label>
                      <div class="col-sm-12">
                          <input class="form-control" type="text" name="judul" id="judul" readonly>
                      </div>
                  </div>
                  <script>
                      var dataIssnJudul = {
                            <?php
                            $sql = $db->query("SELECT * FROM data_buku ORDER BY issn ASC");
                            if ($sql->num_rows != 0) {
                                while ($data = $sql->fetch_assoc()) {
                                    echo "'" . $data['issn'] . "': '" . $data['judul'] . "', ";
                                }
                            }
                            ?>};
                    // Event listener for changes in ISSN
                    document.getElementById('issn').addEventListener('change', function () {
                            var selectedIssn = this.value;
                            var judulInput = document.getElementById('judul');

                            if (selectedIssn !== '') {
                                var selectedJudul = dataIssnJudul[selectedIssn];
                                if (selectedJudul) {
                                    judulInput.value = selectedJudul;
                                } else {
                                    judulInput.value = 'Judul tidak ditemukan';
                                }
                            } else {
                                judulInput.value = '';
                            }
                        });
                </script>
                    <div class="form-group">
                      <label class=" control-label">ID Peminjam</label>
                      <div class="col-sm-12">
                        <select class="form-control" name="id_anggota" id="id_anggota">
                        <option value=""> -- Pilih Salah Satu --</option>
                          <?php
                            $sql = $db->query("SELECT * FROM data_anggota ORDER BY id_anggota ASC");
                            if ($sql->num_rows != 0) {
                              while ($data = $sql->fetch_assoc()){
                              echo '<option value='.$data['id_anggota'].'>'.$data['id_anggota'].'</option>'; }                             
                          ?>
                        </select> 
                      </div>
                    </div>
                    <?php }
                          ?>

                    <div class="form-group">
                      <label class=" control-label">Nama Peminjam</label>
                      <div class="col-sm-12">
                        <input class="form-control" type="text" name="nama" id="nama" readonly>                          
                      </div>
                    </div>

                    <script>
                      var dataIdAnggotaNama = {
                            <?php
                            $sql = $db->query("SELECT * FROM data_anggota ORDER BY id_anggota ASC");
                            if ($sql->num_rows != 0) {
                                while ($data = $sql->fetch_assoc()) {
                                    echo "'" . $data['id_anggota'] . "': '" . $data['nama'] . "', ";
                                }
                            }
                            ?>};
                    // Event listener for changes in ISSN
                    document.getElementById('id_anggota').addEventListener('change', function () {
                            var selectedIdAnggota = this.value;
                            var namaInput = document.getElementById('nama');

                            if (selectedIdAnggota !== '') {
                                var selectedNama = dataIdAnggotaNama[selectedIdAnggota];
                                if (selectedNama) {
                                    namaInput.value = selectedNama;
                                } else {
                                    namaInput.value = 'Nama tidak ditemukan';
                                }
                            } else {
                                namaInput.value = '';
                            }
                        });
                </script>

                    <div class="form-group">
                        <label for="tgl_pinjam" class="form-label">Tanggal Pinjam</label><br>
                          <input name="tgl_pinjam" type="text" id="tgl_pinjam" class="form-control" autocomplete="off" value="<?php echo "".date("Y/m/d").""; ?>" readonly="readonly" />
                    </div>
                    <?php
                    // Menghitung tanggal kembali 7 hari dari tanggal pinjam
                    $tgl_pinjam = date("Y/m/d");
                    //$tgl_kembali = date("Y-m-d", strtotime($tgl_pinjam . " +7 days"));
                    ?>

                    <!-- <div class="form-group">
                        <label for="tgl_kembali" class="form-label">Tanggal Kembali</label><br>
                        <input name="tgl_kembali" type="text" id="tgl_kembali" class="form-control" autocomplete="off" readonly="readonly" />
                    </div> -->

                    <!-- <div class="form-group">
                        <label for="tgl_kembali" class="form-label">Tanggal Kembali</label><br>
                        <input name="tgl_kembali" type="text" id="tgl_kembali" class="form-control" autocomplete="off" value="<?php echo $tgl_kembali; ?>" readonly="readonly" />
                    </div> -->

                    <input type="hidden" name="status" value="pinjam">

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
  <!-- <script src="js/todolist.js"></script> -->
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
  <!-- <script src="js/bootstrap.bundle.min.js"></script> -->
</body>

</html>