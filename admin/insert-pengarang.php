<?php
require '../koneksi.php';

if (isset($_POST['submit'])) {
    $nama_pengarang = $_POST['nama_pengarang']; // Sesuaikan dengan nama input pada formulir

    $query = "INSERT INTO pengarang(nama_pengarang) VALUES ('$nama_pengarang')";

    if ($db->query($query) === TRUE) {
        header("Location: pengarang.php");
    } else {
        echo "Data gagal disimpan " . $db->error;
    }
}
?>
