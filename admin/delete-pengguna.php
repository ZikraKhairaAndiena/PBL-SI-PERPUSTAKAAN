<?php
   
    require '../koneksi.php';

    $user_id = $_GET['user_id'];

$query = $db->query("DELETE FROM admin WHERE user_id='$user_id'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'data-pengguna.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'data-pengguna.php'</script>";	
}
?>