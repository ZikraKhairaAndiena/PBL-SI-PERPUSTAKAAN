<?php
   
    require '../koneksi.php';

    $id_anggota = $_GET['id_anggota'];

$query = $db->query("DELETE FROM data_anggota WHERE id_anggota='$id_anggota'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'data-anggota.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'data-anggota.php'</script>";	
}
?>