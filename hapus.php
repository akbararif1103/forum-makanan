<?php
include 'koneksi.php';
session_start();
$id = $_GET['idHapus'];

$query = mysqli_query($konek, "DELETE FROM isi_diskusi WHERE id_diskusi = '$id'");

if ($query) {
    // Penghapusan berhasil
    $_SESSION['notification'] = 'Diskusi berhasil dihapus';
} else {
    // Penghapusan gagal
    $_SESSION['notification'] = 'Gagal menghapus diskusi';
}

header('location: home.php');
?>
