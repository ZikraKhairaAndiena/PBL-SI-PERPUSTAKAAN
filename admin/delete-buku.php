<?php
   
    require '../koneksi.php';

    $issn = $_GET['issn'];

$query = $db->query("DELETE FROM data_buku WHERE issn='$issn'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'data-buku.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'data-buku.php'</script>";	
}
?>