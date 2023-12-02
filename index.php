<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bincang Kuliner: Masuk ke situs</title>
  <!-- Logo in the title -->
  <link rel="shortcut icon" href="./img/logo.png" >
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
            } else if ($_GET['pesan'] == 'logout') {
              require './notifikasi/notifLogout.php';
            } else if ($_GET['pesan'] == 'belum_login'){
              require './notifikasi/notifBelum.php';
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

    <div class="login-right w-50">
      <img src="img/wallpaper2.png" alt="Wallpaper" style="width: 100%; height: 100%; object-fit: cover;">
    </div>

  </section>

  <!-- Bootstrap Script -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>