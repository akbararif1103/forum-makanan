<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bincang Kuliner: Masuk ke situs</title>

  <!-- Logo in the title -->
  <link rel="shortcut icon" href="img/logo.png" type="image/png">


  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <!-- CSS -->
  <link rel="stylesheet" href="style1.css">

  <!-- Font Google -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&family=Roboto+Slab:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>

  <section class="login d-flex">
    <div class="login-left w-50 h-100">
      <div class="row h-100 justify-content-center align-items-center">
        <div class="col-7">
          <div class="header">
            <h1>Selamat Datang</h1>
            <p>Selamat datang kembali! Silahkan masukkan detail anda</p>
          </div>

          <!-- cek login -->
          <?php
          if (isset($_GET['pesan'])) {
            if ($_GET["pesan"] == 'gagal') {
              require './notifikasi/notifGagal.php';
            } else if($_GET['pesan'] == 'logout') {
              require './notifikasi/notifLogout.php';
            }
          }
          ?>


          <form id="" class="login-form" action="cek_login.php" method="POST">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username">

            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password">

            <button type="submit" class="btn btn-primary">Masuk</button>

            <div class="text-center">
              <span class="d-inline">Tidak punya akun?
                <a href="daftar.php" class="d-inline text-decoration-none">Daftar gratis</a></span>
            </div>
          </form>
        </div>
      </div>
    </div>



    <div class="login-right w-50 ">
      <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/pict1.jpg" class="w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>First slide label</h5>
              <p>Some representative placeholder content for the first slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="img/pict2.jpg" class="w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Second slide label</h5>
              <p>Some representative placeholder content for the second slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="img/pict3.jpg" class="w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Third slide label</h5>
              <p>Some representative placeholder content for the third slide.</p>
            </div>

          </div>
          <div class="carousel-item">
            <img src="img/pict4.jpg" class="w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Second slide label</h5>
              <p>Some representative placeholder content for the second slide.</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>

  </section>


  <!-- Bootstrap Script -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>