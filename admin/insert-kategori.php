<?php
require '../koneksi.php';

if (isset($_POST['submit'])) {
    $nama_kategori = $_POST['nama_kategori']; // Sesuaikan dengan nama input pada formulir

    $query = "INSERT INTO kategori(nama_kategori) VALUES ('$nama_kategori')";

    if ($db->query($query) === TRUE) {
        header("Location: kategori.php");
    } else {
        echo "Data gagal disimpan " . $db->error;
    }
}
?>
