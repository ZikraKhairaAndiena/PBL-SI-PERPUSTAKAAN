<?php
   
    require '../koneksi.php';

    $id = $_GET['id'];

$query = $db->query("DELETE FROM pengarang WHERE id='$id'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'pengarang.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'pengarang.php'</script>";	
}
?>