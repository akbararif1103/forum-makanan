<?php
            include 'koneksi.php';
            $id = $_POST["id_diskusi"];
            $judul = $_POST["judul"];
            $isi = $_POST["isi"];

            $sql = "UPDATE isi_diskusi SET judul = '$judul', isi = '$isi' WHERE id_diskusi = '$id'";
            $query = mysqli_query($konek, $sql);
            if ($query) {
                header("Location: diskusi.php?idDiskusi=$id");
            } else {
                echo "update gagal";
            }
            ?>