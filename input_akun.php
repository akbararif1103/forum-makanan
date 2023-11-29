<?php
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];
$rePassword = $_POST['rePassword'];

// Validasi kesamaan password
if ($password != $rePassword) {
    header('location:daftar.php?pesan=gagalInput');
    exit;
}


$query = "INSERT INTO user (username, password) VALUES ('$username', '$password')";


$result = mysqli_query($konek, $query);

if ($result) {
    header("Location: index.php");
    exit;
} else {
    echo "Proses Input gagal";
}

// Tutup koneksi
mysqli_close($konek);
?>
