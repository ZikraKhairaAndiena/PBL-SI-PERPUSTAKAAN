<?php
include "../koneksi.php";

$maks_pinjam        = 3;
$maks_hari_pinjam   = 7;

$id_trans   = isset($_GET['id_trans']) ? $_GET['id_trans'] : "";
$issn       = isset($_GET['issn']) ? $_GET['issn'] : "";

if ($issn == "") {
    echo "<script>alert('Anda Belum Memilih Buku!'); window.location = 'peminjaman.php'</script>";
} else {
    // Update status peminjaman menjadi 'kembali'
    $update_status_query = $db->prepare("UPDATE trans_pinjam SET status='kembali' WHERE id=?");
    $update_status_query->bind_param("s", $id_trans);
    $us = $update_status_query->execute();
    $update_status_query->close();

    // Ambil jumlah buku yang dimiliki dan jumlah buku yang tersedia
    $get_jumlah_query = $db->prepare("SELECT jumlah, tersedia FROM data_buku WHERE issn=?");
    $get_jumlah_query->bind_param("s", $issn);
    $get_jumlah_query->execute();
    $get_jumlah_query->bind_result($jumlah_buku, $tersedia_buku);
    $get_jumlah_query->fetch();
    $get_jumlah_query->close();

    // Tambah kembali buku yang dikembalikan ke stok jika jumlah tersedia tidak melebihi total jumlah buku
    // Proses pengembalian buku
$updatequery = "UPDATE data_buku SET tersedia = tersedia + 1 WHERE issn = '$issn'";
if ($db->query($updatequery) === TRUE) {
    // Setelah mengembalikan, hapus entri dari tabel trans_pinjam
    $deletequery = "DELETE FROM trans_pinjam WHERE issn = '$issn' AND id_anggota = '$id_peminjam'";
    if ($db->query($deletequery) === TRUE) {
        // Redirect setelah transaksi pengembalian berhasil
        header("Location: pengembalian.php");
        exit;
    } else {
        echo "Error deleting transaction record: " . $db->error;
    }
} else {
    echo "Error updating book availability during return: " . $db->error;
}

}
?>
