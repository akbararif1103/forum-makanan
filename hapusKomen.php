<?php
include 'koneksi.php';
session_start();
$id = $_GET['idHapuskomen'];
$id_diskusi = $_GET['idDiskusi'];

$query = mysqli_query($konek, "DELETE FROM komentar WHERE id = '$id'");

if ($query) {
    // Penghapusan berhasil
    $_SESSION['notification'] = 'Pendapat berhasil dihapus';
} else {
    // Penghapusan gagal
    $_SESSION['notification'] = 'Gagal menghapus pendapat';
}

header("Location: diskusi.php?idDiskusi=$id_diskusi");
?>
