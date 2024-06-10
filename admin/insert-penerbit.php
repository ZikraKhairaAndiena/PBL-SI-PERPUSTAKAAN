<?php
require '../koneksi.php';

if (isset($_POST['submit'])) {
    $nama_penerbit = $_POST['nama_penerbit']; // Sesuaikan dengan nama input pada formulir

    $query = "INSERT INTO penerbit(nama_penerbit) VALUES ('$nama_penerbit')";

    if ($db->query($query) === TRUE) {
        header("Location: penerbit.php");
    } else {
        echo "Data gagal disimpan " . $db->error;
    }
}
?>
