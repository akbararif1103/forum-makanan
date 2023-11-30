<?php
session_start();

include "koneksi.php";

$username = $_POST["username"];
$password = $_POST["password"];

$hasil = mysqli_query($konek, "SELECT * FROM user WHERE username='$username' AND password='$password'");
$data =mysqli_fetch_array($hasil);
$cek = mysqli_num_rows($hasil);

if ($cek > 0) {
    $_SESSION['id'] = $data['id'];
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    header('location:home.php'); 
} else {
    header('location:index.php?pesan=gagal');
}

// Tutup koneksi
mysqli_close($konek);
?>
