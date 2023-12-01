<?php
    session_start();
    if(empty($_SESSION['username'])){
        header("location:index.php?pesan=belum_login");
    }

    include "koneksi.php"; 
    $id_user = $_SESSION["id"];
    $diskusi_id = $_POST["diskusi_id"];
    $komentar = $_POST["komentar"];
    $reply_id = $_POST["reply_id"];
    $query = "INSERT INTO `komentar` (`user_id`, `diskusi_id`,`id_reply`, `tanggal`, `isi_komen`) VALUES ('$id_user', '$diskusi_id','$reply_id', current_timestamp(), '$komentar')";
    $result = mysqli_query($konek, $query) or die(mysqli_error($konek));

    if($result){
        header("Location: diskusi.php?idDiskusi=$diskusi_id");
    } else{
        echo "Input gagal";
    }
?>