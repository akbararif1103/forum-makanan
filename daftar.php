<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bincang Kuliner: Daftar Akun</title>

  <!-- Logo in the title -->
  <link rel="shortcut icon" href="./img/logo.png" type="image/png">

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

  <section class="signup d-flex">
    <div class="signup-left w-50 h-100">
    <img src="img/wallpaper1.png" alt="Wallpaper" style="width: 100%; height: 100%; object-fit: cover;">
    </div>

    <div class="login-right w-50">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-7">
          <div class="header">
            <h1>Bergabung Bersama Kami</h1>
            <p>Daftar dan nikmati fitur eksklusif kami</p>
          </div>

          <?php
            if (isset($_GET['pesan'])) {
              if ($_GET["pesan"] == 'gagalInput') {
                require './notifikasi/notifPassword.php';
              }
            }
          ?>

          <form id="" class="login-form" action="input_akun.php" method="POST">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" required>

            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>


            <label for="rePassword" class="form-label">Konfirmasi Password</label>
            <input type="password" class="form-control" id="rePassword" name="rePassword" placeholder="Masukkan ulang password" required>

            <button type="submit" class="btn btn-primary">Daftar</button>
          </form>

          <div class="text-center">
            <span class="d-inline">Sudah punya akun?
              <a href="index.php" class="d-inline text-decoration-none">Masuk disini</a></span>
          </div>
        </div>
      </div>
      
    </div>

  </section>

  </div>
  </section>

  <!-- Bootstrap Script -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>