<!DOCTYPE html>
<html>
<?php
session_start();
include 'koneksi.php';

if (empty($_SESSION['username'])) {
    header("location:index.php?pesan=belum_login");
}
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Collapsible sidebar using Bootstrap 4</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

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
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">Kategori</a>
                        </li>
                        <li>
                            <a href="#">My Forum</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">Member</a>
                </li>
                <li>
                    <a href="#">Profile</a>
                </li>
                <li>
                    <a href="#">Source Code</a>
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
                        <span>Toggle Sidebar</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">My forum</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="input.php">Add Discuss</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Profile</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <?php
            $id_diskusi = $_GET['idDiskusi'];
            $query = "SELECT *  FROM  isi_diskusi d, user u WHERE d.id_diskusi='$id_diskusi' && d.user_id=u.id";
            $result = mysqli_query($konek, $query);
            $row = mysqli_fetch_array($result);
            ?>
            <h1><?= $row["judul"] ?></h1>
            <cite>Oleh <span class="fw-bold"><?= $row['username'] ?></span>, Pada <?= date('d F Y', strtotime($row['tanggal'])) ?></cite>
            <br>
            <div class="line"></div>
            <h5>Isi Diskusi:</h5>
            <div class="fw-normal"><?= $row["isi"] ?></div>
            <br><br>
            <?php if ($_SESSION['id'] == $row['user_id']) { ?>
                <div class="float-right col-2">
                    <a href="edit.php?idEdit=<?= $row["id_diskusi"] ?>" class="col 4 text-decoration-underline">Edit</a>
                    |
                    <a href="hapus.php?idHapus=<?= $row["id_diskusi"] ?>" class="col-4 text-decoration-underline">Hapus</a>
                </div>
                <div class="line"></div>
            <?php } ?>
            <div class="line"></div>
            <div class="mb-4">
                <h1>Komentar:</h1>
                <a href="" class="text-decoration-underline link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Beri Komentar</a>
            </div>

            <?php
            $previous_comment = '';
            $reply_id = null;

            $komen_query = "SELECT * FROM isi_diskusi d, user u, komentar k WHERE $id_diskusi = k.diskusi_id AND u.id = k.user_id AND k.id_reply=0 ORDER BY k.tanggal DESC";
            $komen_result = mysqli_query($konek, $komen_query);
            $komen_data = [];

            while ($komen_row = mysqli_fetch_array($komen_result)) {
                $komen_data[] = $komen_row;
            }

            foreach ($komen_data as $komen_row) {
                require 'outputKomen.php';
            }
            ?>
            <form action="komentar.php" method="post" class="d-flex flex-column mt-4">
                <h3 id="title">Leave A Comment</h3>
                <input type="hidden" name="reply_id" id="reply_id">
                <input type="text" name="diskusi_id" value="<?php echo $_GET['idDiskusi']; ?>" hidden>
                <textarea name="komentar" id="" cols="30" rows="10" placeholder="Ketik Komentar"></textarea>
                <button type="submit" class="btn btn-primary">Tambahkan Komentar</button>
            </form>

            <script>
                function reply(id, name) {
                    title = document.getElementById('title');
                    title.innerHTML = "Reply to " + name;
                    document.getElementById('reply_id').value = id;
                }
            </script>
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