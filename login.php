<?php
include 'functions.php';

if (isset($_SESSION['email'])) {
  header("Location: dashboard.php");
}

if(ISSET($_POST['masuk'])) {
  $email = $_POST['email'];
  $password = md5($_POST['password']);

  $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$password'");

  if ($query->num_rows > 0) {
      $row = mysqli_fetch_assoc($query);
      $_SESSION['id'] = $row['id'];
      $_SESSION['email'] = $row['email'];
      $_SESSION['role'] = $row['role'];
      $_SESSION['nama_lengkap'] = $row['nama_lengkap'];
      $_SESSION['nama_pengguna'] = $row['nama_pengguna'];
      $_SESSION['gambar'] = $row['gambar'];
      header("Location: dashboard.php");
  } else {
      echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warung Kebon Nusa Indah</title>
    <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    
    
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow p-3 mb-5 bg-body rounded">
        <div class="container">
          <a class="navbar-brand" href="#">
            <h6 class="float-md-start mb-0">SISTEM INFORMASI INVENTORY<br>WARUNG KEBON NUSA INDAH</h6>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
    </nav>
    <div class="container text-center mx-auto col-6" style="padding-top: 100px;">
      <h4 class="fw-bolder mx-auto mb-50"  style="padding-bottom: 50px;">MASUK</h4>

      <form action="" method="post">
        <div class="form-floating mb-3 col-6 mx-auto">
          <input type="email" class="form-control" id="email" name="email">
          <label for="email">Email</label>
        </div>

        <div class="form-floating mb-20 col-6 mx-auto">
          <input type="password" class="form-control" id="password" name="password">
          <label for="password">Kata Sandi</label>
        </div>

        <div class="mb-3 form-check">
          
        </div>

        <div class="row col-12 comtainer">

          <div class="form-floating col-md-6">
            <a href="index.html" class="btn btn-outline-secondary rounded" style="margin-left: 105px;" type="button">Kembali</a>
          </div>

          <div class="form-floating col-6">
            <button class="btn btn-secondary rounded" style="margin-right: 40px;" type="submit" name="masuk">Masuk</button>
          </div>

        </div>

      </form>
      
    </div>

    <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>