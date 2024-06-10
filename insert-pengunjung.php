<?php
require 'koneksi.php';

    $nama = $_POST['nama']; // sesuai dengan input name pada formulir
    $email = $_POST['email']; // sesuai dengan input name pada formulir
    $perlu = $_POST['perlu']; // sesuai dengan input name pada formulir
    $saran = $_POST['saran']; // sesuai dengan input name pada formulir
    $tgl_kunjung = $_POST['tgl_kunjung']; // sesuai dengan input name pada formulir
    $jam_kunjung = $_POST['jam_kunjung']; // sesuai dengan input name pada formulir

    $query = $db->query("INSERT INTO pengunjung (nama, email, perlu, saran, tgl_kunjung, jam_kunjung) VALUES ('$nama', '$email', '$perlu', '$saran', '$tgl_kunjung', '$jam_kunjung')");
    if ($query){
        echo "<script>alert('Data Berhasil dimasukan!'); window.location = 'index.php'</script>";	
    } else {
        echo "<script>alert('Data Gagal dimasukan!'); window.location = 'index.php'</script>";	
    }

?>

