<!DOCTYPE html>
<html>
<?php
session_start();
include 'koneksi.php';

if (empty($_SESSION['username'])) {
    header("location:index.php?pesan=belum_login");
}

// Check apakah ada notifikasi yang disimpan di session
if (isset($_SESSION['notification'])) {
    // Tampilkan notifikasi dan hapus dari session
    echo "<script>alert('" . $_SESSION['notification'] . "');</script>";
    unset($_SESSION['notification']);
}

?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Bincang Kuliner : Member</title>

    <link rel="shortcut icon" href="/img/logo.png">

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>

<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <a href="home.php">
                <div class="sidebar-header">
                    <h3>Bincang Kuliner</h3>
                </div>
            </a>

            <ul class="list-unstyled components">
                <div class="d-flex flex-row">
                    <div id="text" class="w-50 ml-4" style="margin-top: 13px;"></div>
                    <p class="fw-bold" style="margin-left: -35px;">Food</p>
                </div>
                <li class="active">
                    <a href="home.php" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
                </li>
                <li>
                    <a href="member.php">Member</a>
                </li>
                <li>
                    <a href="https://github.com/akbararif1103/forum-makanan">Source Code</a>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a href="input.php" class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" style="background: #fff; color:#7386D5;">Add Discussion</a>
                </li>
                <li>
                    <a href="logout.php" class="article">Log out</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span></span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="home.php">Home</a>
                            </li>
                            <li class="nav-item">
<<<<<<< HEAD
                                <a class="nav-link" href="myforum.php?idUser=<?= $_SESSION['id'] ?>">My forum</a>
=======
                                <a class="nav-link" href="myforum.php">My forum</a>
>>>>>>> 9eca7e4a5048fe1fc65fe172df530e41e8438d22
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="input.php">Add Discuss</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <?php
            $query = "SELECT u.*,u.id AS id_user, COUNT(d.id_diskusi) as jumlah_diskusi 
          FROM user u 
          LEFT JOIN isi_diskusi d ON u.id = d.user_id 
          GROUP BY u.id 
          ORDER BY u.id DESC";
            $result = mysqli_query($konek, $query);
            $data = [];
            while ($row = mysqli_fetch_array($result)) {
                $data[] = $row;
            }
            ?>
            <div class="d-flex flex-col gap-5 flex-wrap justify-content-start">
                <?php
                foreach ($data as $row) {
                ?>
                    <div class="card" style="width: 15rem;">
                        <div class="card-body">
                            <h5 class="card-title"><?= $row["username"] ?></h5>
                            <p class="card-text">Jumlah Diskusi: <?= $row["jumlah_diskusi"] ?></p>
                            <a href="myforum.php?idUser=<?= $row["id_user"] ?>" class="btn btn-primary">Lihat Forum</a>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>

        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

</body>
<script src="./js/script.js"></script>
<script src="./js/autotyping.js"></script>

</html>