<?php
   
    require '../koneksi.php';

    $id = $_GET['id'];

$query = $db->query("DELETE FROM penerbit WHERE id='$id'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'penerbit.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'penerbit.php'</script>";	
}
?>