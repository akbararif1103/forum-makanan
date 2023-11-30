<?php
    session_start();
    if(empty($_SESSION['username'])){
        header("location:index.php?pesan=belum_login");
    }

    include "koneksi.php"; 
    $id_user = $_SESSION["id"];
    $judul = $_POST["judul"];   
    $isi =  nl2br($_POST["isi"]);
    var_dump($id_user);
    $query = "INSERT INTO `isi_diskusi` (`user_id`, `judul`, `tanggal`, `isi`) VALUES ('$id_user', '$judul', current_timestamp(), '$isi')";
    $result = mysqli_query($konek, $query) or die(mysqli_error($konek));

    if($result){
        header("location:home.php");
    } else{
        echo "Input gagal";
    }
?>
