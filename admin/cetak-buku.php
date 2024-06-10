<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cetak Laporan Buku</title>
    <!-- Tambahkan link CSS Bootstrap di sini -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @media print { 
            /* Sembunyikan tombol cetak saat mencetak */
            .btn-print {
                display: none;
            }
            
            /* Atur style yang ingin diaplikasikan saat mencetak */
            body {
                font-family: Arial, sans-serif;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 20px;
            }

            table, th, td {
                border: 1px solid black;
                padding: 8px;
            }

            th {
                background-color: #f2f2f2;
            }
        }
    </style>
</head>
<body>
<div class="container mt-5">
<img src="images/kop2.jpg" alt="Header Image"></br>
    <h2 class="text-center"><strong>Laporan Data Buku</strong></h2>
    <h4 class="text-center">PERPUSTAKAAN POLITEKNIK NEGERI PADANG</h4>
    <di class="col-sm-6">
    <div class="container">
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>NO</th>
                    <th>ISSN</th>
                    <th>Judul</th>
                    <th>Pengarang</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                    <th>Kategori</th>
                    <th>Jumlah</th>
                    <th>Asal</th>
                    <th>Tanggal Input</th>
                    <!-- <th>Keterangan</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                require '../koneksi.php';

                $query = "SELECT * FROM data_buku 
                              INNER JOIN kategori ON data_buku.kategori_id=kategori.id
                              INNER JOIN pengarang ON data_buku.pengarang_id = pengarang.id
                              INNER JOIN penerbit ON data_buku.penerbit_id = penerbit.id";
                $result = $db->query($query);

                if (!$result) {
                    die("Error in query: " . $db->error);
                }

                $nomor = 1;
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $nomor++ . "</td>";
                    echo "<td>" . $row['issn'] . "</td>";
                    echo "<td>" . $row['judul'] . "</td>";
                    echo "<td>" . $row['nama_pengarang'] . "</td>";
                    echo "<td>" . $row['nama_penerbit'] . "</td>";
                    echo "<td>" . $row['thn_terbit'] . "</td>";
                    echo "<td>" . $row['nama_kategori'] . "</td>";
                    echo "<td>" . $row['jumlah'] . "</td>";
                    echo "<td>" . $row['asal'] . "</td>";
                    echo "<td>" . $row['tgl_input'] . "</td>";
                    echo "</tr>";
                }

                $result->free_result();
                $db->close();
                ?>
            </tbody>
        </table>
        <form id="signature-form">
                    <div class="signature">
                        <div class="col-12">
                            <label for="signature">Padang, </label></br>
                            <canvas id="signature-canvas" width="300" height="100"></canvas></br>
                            <label for="signature">Admin atau Pustakawan</label>
                            <br>
                            <label for="signature">ID User</label>
                        </div>
                    </div>
                    <!-- Tambahkan script JavaScript untuk menangani tanda tangan di sini -->
                    <script>
                        function printReport() {
                            // Cetak laporan secara otomatis
                            window.print();
                        }
                        // Panggil fungsi cetak saat halaman dimuat
                        printReport();
                    </script>

                    <!-- Tambahkan link JS Bootstrap di sini -->
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                </form>
    </div>

</body>
</html>