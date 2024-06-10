<?php
    // Panggil session_start() hanya jika sesi belum aktif
    if (!isset($_SESSION)) {
        session_start();
    }

    include '../koneksi.php';
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
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Selamat Datang <b><?php echo $nama1; ?> </b></h3>
                </div>
            </div>
        </div>
    </div>
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card tale-bg">
                <div class="card-people mt-auto">
                  <img src="images/dashboard/gambar.jpg" alt="people">
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin transparent">
              <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="mb-4">Total Anggota</p>
                      <p class="fs-30 mb-2">4006</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                      <p class="mb-4">Total Buku</p>
                      <p class="fs-30 mb-2">61344</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                      <p class="mb-4">Total Peminjaman Buku</p>
                      <p class="fs-30 mb-2">34040</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                      <p class="mb-4">Total Pengunjung</p>
                      <p class="fs-30 mb-2">47033</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Advanced Table</p>
                  <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table id="example" class="display expandable-table" style="width:100%">
                          <thead>
                            <tr>
                              <th>No Peminjaman</th>
                              <th>Kode Buku</th>
                              <th>Nama Buku</th>
                              <th>Nama Peminjam</th>
                              <th>NIM / NIP Peminjam</th>
                              <th>Status</th>
                              <th>Tenggat Pengembalian</th>
                              <th></th>
                            </tr>
                          </thead>
                      </table>
                      </div>
                    </div>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>