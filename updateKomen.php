<?php
            include 'koneksi.php';
            $id = $_POST["id_komen"];
            $isi = $_POST["isi"];
            $id_diskusi = $_POST["id_diskusi"];
            
            $sql = "UPDATE komentar SET isi_komen = '$isi' WHERE id = '$id'";
            $query = mysqli_query($konek, $sql);
            if ($query) {
                header("Location: diskusi.php?idDiskusi=$id_diskusi");
            } else {
                echo "update gagal";
            }
            ?>