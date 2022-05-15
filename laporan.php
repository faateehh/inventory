<?php 
include 'functions.php';

if(ISSET($_SESSION['role'])){

} else {
  header('location: login.php');
}

$query = mysqli_query($conn, "SELECT * FROM bahan_baku WHERE stok < 10");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="vendor/twbs/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <link href="vendor/twbs/bootstrap/dist/css/all.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">

    <title>Document</title>
</head>
<body>

    <!-- Navbar -->
    <!-- Sidebar -->
<nav class="navbar navbar-expand-md navbar-light bg-light mb-4 shadow">
  <div class="container-fluid">
      <a class="navbar-brand text d-flex align-items-center justify-content-center mx-3" href="#">
          <h6 class="float-md-start">SISTEM INFORMASI INVENTORY<br>WARUNG KEBON NUSA INDAH</h6>
      </a>
      <!-- <button type="button" class="btn btn-warning rounded-pill" data-toggle="tooltip" data-placement="left" title="Stok menipis, segera stok ulang bahan baku nya!"> 
      <i class="fa-solid fa-bell"> </i>  Notifikasi</button> -->

      <div class="btn-group">
        <button type="button" class="btn btn-warning rounded-pill" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa-solid fa-bell"> </i>  Notifikasi
        </button>
        <ul class="dropdown-menu dropdown-menu-end">
          <?php foreach( $query as $data ) : ?>
          <li><button class="dropdown-item" type="button">Stok <?= $data['nama']; ?> tersisa <?= $data['stok']; ?>!</button></li>
          <?php endforeach; ?>
        </ul>
      </div>

  </div>
</nav>

<?php
if ($_SESSION['role'] == 'admin') {
  echo '
  <div class="row">
    <!-- Sidebar -->
    <div class="d-flex flex-column flex-shrink-0 p-3 bg-light col-3" style="width: 300px;">
    <div class="d-flex align-items-center link-dark text-decoration-none">
        <img src="src/images/'.$_SESSION['gambar'].'" alt="" width="40" height="40" class="rounded-circle me-2">
        <strong>'.$_SESSION['nama_lengkap'].'</strong>
    </div>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
        <a href="dashboard.php" class="nav-link link-dark" aria-current="page">
            <!-- <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"/></svg> -->
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 5.69L17 10.19V18H15V12H9V18H7V10.19L12 5.69V5.69ZM12 3L2 12H5V20H11V14H13V20H19V12H22L12 3Z" fill="black"/>
            </svg>
            Beranda
        </a>
        </li>
        <li>
        <a href="bahan-baku.php" class="nav-link link-dark">
            <!-- <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg> -->
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2 20H22V16H2V20ZM4 17H6V19H4V17ZM2 4V8H22V4H2ZM6 7H4V5H6V7ZM2 14H22V10H2V14ZM4 11H6V13H4V11Z" fill="black"/>
            </svg>
            Stok Bahan Baku
        </a>
        </li>
        <li>
        <a href="stok-masuk.php" class="nav-link link-dark">
            <!-- <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg> -->
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2 20H22V16H2V20ZM4 17H6V19H4V17ZM2 4V8H22V4H2ZM6 7H4V5H6V7ZM2 14H22V10H2V14ZM4 11H6V13H4V11Z" fill="black"/>
            </svg>
            Stok Masuk
        </a>
        </li>
        <li>
        <a href="stok-keluar.php" class="nav-link link-dark">
            <!-- <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg> -->
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2 20H22V16H2V20ZM4 17H6V19H4V17ZM2 4V8H22V4H2ZM6 7H4V5H6V7ZM2 14H22V10H2V14ZM4 11H6V13H4V11Z" fill="black"/>
            </svg>
            Stok Keluar
        </a>
        </li>
        <li>
        <a href="laporan.php" class="nav-link active">
            <!-- <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg> -->
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M14 2H6C4.9 2 4 2.9 4 4V20C4 21.1 4.9 22 6 22H18C19.1 22 20 21.1 20 20V8L14 2ZM18 20H6V4H13V9H18V20ZM9 13V19H7V13H9ZM15 15V19H17V15H15ZM11 11V19H13V11H11Z" fill="black"/>
            </svg>
            Laporan Penggunaan Barang
        </a>
        </li>
        <li>
        <a href="grafika.php" class="nav-link link-dark">
            <!-- <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg> -->
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6 16.5L3 19.44V11H6V16.5ZM11 14.66L9.43 13.32L8 14.64V7H11V14.66ZM16 13L13 16V3H16V13ZM18.81 12.81L17 11H22V16L20.21 14.21L13 21.36L9.53 18.34L5.75 22H3L9.47 15.66L13 18.64" fill="black"/>
            </svg>
            Grafik Stok
        </a>
        </li>
        <li>
        <a href="users.php" class="nav-link link-dark">
            <!-- <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg> -->
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 5C11.0717 5 10.1815 5.36875 9.52513 6.02513C8.86875 6.6815 8.5 7.57174 8.5 8.5C8.5 9.42826 8.86875 10.3185 9.52513 10.9749C10.1815 11.6313 11.0717 12 12 12C12.9283 12 13.8185 11.6313 14.4749 10.9749C15.1313 10.3185 15.5 9.42826 15.5 8.5C15.5 7.57174 15.1313 6.6815 14.4749 6.02513C13.8185 5.36875 12.9283 5 12 5ZM12 7C12.3978 7 12.7794 7.15804 13.0607 7.43934C13.342 7.72064 13.5 8.10218 13.5 8.5C13.5 8.89782 13.342 9.27936 13.0607 9.56066C12.7794 9.84196 12.3978 10 12 10C11.6022 10 11.2206 9.84196 10.9393 9.56066C10.658 9.27936 10.5 8.89782 10.5 8.5C10.5 8.10218 10.658 7.72064 10.9393 7.43934C11.2206 7.15804 11.6022 7 12 7ZM5.5 8C4.83696 8 4.20107 8.26339 3.73223 8.73223C3.26339 9.20107 3 9.83696 3 10.5C3 11.44 3.53 12.25 4.29 12.68C4.65 12.88 5.06 13 5.5 13C5.94 13 6.35 12.88 6.71 12.68C7.08 12.47 7.39 12.17 7.62 11.81C6.89148 10.8606 6.49767 9.69672 6.5 8.5V8.22C6.2 8.08 5.86 8 5.5 8ZM18.5 8C18.14 8 17.8 8.08 17.5 8.22V8.5C17.5 9.7 17.11 10.86 16.38 11.81C16.5 12 16.63 12.15 16.78 12.3C17.2412 12.7471 17.8577 12.998 18.5 13C18.94 13 19.35 12.88 19.71 12.68C20.47 12.25 21 11.44 21 10.5C21 9.83696 20.7366 9.20107 20.2678 8.73223C19.7989 8.26339 19.163 8 18.5 8ZM12 14C9.66 14 5 15.17 5 17.5V19H19V17.5C19 15.17 14.34 14 12 14ZM4.71 14.55C2.78 14.78 0 15.76 0 17.5V19H3V17.07C3 16.06 3.69 15.22 4.71 14.55ZM19.29 14.55C20.31 15.22 21 16.06 21 17.07V19H24V17.5C24 15.76 21.22 14.78 19.29 14.55ZM12 16C13.53 16 15.24 16.5 16.23 17H7.77C8.76 16.5 10.47 16 12 16Z" fill="black"/>
            </svg>
            Kelola Hak Akses
        </a>
        </li>
        <li>
        <a href="pengaturan.php" class="nav-link link-dark">
            <!-- <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg> -->
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.0001 15.5C11.0718 15.5 10.1816 15.1313 9.52521 14.4749C8.86883 13.8185 8.50008 12.9283 8.50008 12C8.50008 11.0717 8.86883 10.1815 9.52521 9.52513C10.1816 8.86875 11.0718 8.5 12.0001 8.5C12.9283 8.5 13.8186 8.86875 14.475 9.52513C15.1313 10.1815 15.5001 11.0717 15.5001 12C15.5001 12.9283 15.1313 13.8185 14.475 14.4749C13.8186 15.1313 12.9283 15.5 12.0001 15.5ZM19.4301 12.97C19.4701 12.65 19.5001 12.33 19.5001 12C19.5001 11.67 19.4701 11.34 19.4301 11L21.5401 9.37C21.7301 9.22 21.7801 8.95 21.6601 8.73L19.6601 5.27C19.5401 5.05 19.2701 4.96 19.0501 5.05L16.5601 6.05C16.0401 5.66 15.5001 5.32 14.8701 5.07L14.5001 2.42C14.4798 2.30222 14.4184 2.19543 14.3269 2.11855C14.2354 2.04168 14.1196 1.99968 14.0001 2H10.0001C9.75008 2 9.54008 2.18 9.50008 2.42L9.13008 5.07C8.50008 5.32 7.96008 5.66 7.44008 6.05L4.95008 5.05C4.73008 4.96 4.46008 5.05 4.34008 5.27L2.34008 8.73C2.21008 8.95 2.27008 9.22 2.46008 9.37L4.57008 11C4.53008 11.34 4.50008 11.67 4.50008 12C4.50008 12.33 4.53008 12.65 4.57008 12.97L2.46008 14.63C2.27008 14.78 2.21008 15.05 2.34008 15.27L4.34008 18.73C4.46008 18.95 4.73008 19.03 4.95008 18.95L7.44008 17.94C7.96008 18.34 8.50008 18.68 9.13008 18.93L9.50008 21.58C9.54008 21.82 9.75008 22 10.0001 22H14.0001C14.2501 22 14.4601 21.82 14.5001 21.58L14.8701 18.93C15.5001 18.67 16.0401 18.34 16.5601 17.94L19.0501 18.95C19.2701 19.03 19.5401 18.95 19.6601 18.73L21.6601 15.27C21.7801 15.05 21.7301 14.78 21.5401 14.63L19.4301 12.97Z" fill="black"/>
            </svg>
            Pengaturan
        </a>
        </li>
        <li>
        <a href="logout.php"  type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="nav-link link-dark">
            <!-- <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg> -->
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16 17V14H9V10H16V7L21 12L16 17ZM14 2C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6H14V4H5V20H14V18H16V20C16 20.5304 15.7893 21.0391 15.4142 21.4142C15.0391 21.7893 14.5304 22 14 22H5C4.46957 22 3.96086 21.7893 3.58579 21.4142C3.21071 21.0391 3 20.5304 3 20V4C3 3.46957 3.21071 2.96086 3.58579 2.58579C3.96086 2.21071 4.46957 2 5 2H14Z" fill="black"/>
            </svg>
            Keluar
        </a>
        </li>
    </ul>
    <hr>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Peringatan!</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            '.$_SESSION['nama_pengguna'].', Yakin kamu mau keluar?
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <a type="button" href="logout.php" class="btn btn-primary">Ya, saya yakin</a>
            </div>
        </div>
        </div>
    </div>
    ';
    } else if ($_SESSION['role'] == 'staff') {
    echo '
    <div class="row">
    <!-- Sidebar -->
    <div class="d-flex flex-column flex-shrink-0 p-3 bg-light col-3" style="width: 300px;">
    <div class="d-flex align-items-center link-dark text-decoration-none">
        <img src="src/images/'.$_SESSION['gambar'].'" alt="" width="40" height="40" class="rounded-circle me-2">
        <strong>'.$_SESSION['nama_lengkap'].'</strong>
    </div>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
        <a href="dashboard.php" class="nav-link link-dark" aria-current="page">
            <!-- <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"/></svg> -->
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 5.69L17 10.19V18H15V12H9V18H7V10.19L12 5.69V5.69ZM12 3L2 12H5V20H11V14H13V20H19V12H22L12 3Z" fill="black"/>
            </svg>
            Beranda
        </a>
        </li>
        <li>
        <a href="bahan-baku.php" class="nav-link link-dark">
            <!-- <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg> -->
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2 20H22V16H2V20ZM4 17H6V19H4V17ZM2 4V8H22V4H2ZM6 7H4V5H6V7ZM2 14H22V10H2V14ZM4 11H6V13H4V11Z" fill="black"/>
            </svg>
            Stok Bahan Baku
        </a>
        </li>
        <li>
        <a href="stok-masuk.php" class="nav-link link-dark">
            <!-- <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg> -->
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2 20H22V16H2V20ZM4 17H6V19H4V17ZM2 4V8H22V4H2ZM6 7H4V5H6V7ZM2 14H22V10H2V14ZM4 11H6V13H4V11Z" fill="black"/>
            </svg>
            Stok Masuk
        </a>
        </li>
        <li>
        <a href="stok-keluar.php" class="nav-link link-dark">
            <!-- <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg> -->
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2 20H22V16H2V20ZM4 17H6V19H4V17ZM2 4V8H22V4H2ZM6 7H4V5H6V7ZM2 14H22V10H2V14ZM4 11H6V13H4V11Z" fill="black"/>
            </svg>
            Stok Keluar
        </a>
        </li>
        <li>
        <a href="laporan.php" class="nav-link active">
            <!-- <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg> -->
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M14 2H6C4.9 2 4 2.9 4 4V20C4 21.1 4.9 22 6 22H18C19.1 22 20 21.1 20 20V8L14 2ZM18 20H6V4H13V9H18V20ZM9 13V19H7V13H9ZM15 15V19H17V15H15ZM11 11V19H13V11H11Z" fill="black"/>
            </svg>
            Laporan Penggunaan Barang
        </a>
        </li>
        <li>
        <a href="grafika.php" class="nav-link link-dark">
            <!-- <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg> -->
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6 16.5L3 19.44V11H6V16.5ZM11 14.66L9.43 13.32L8 14.64V7H11V14.66ZM16 13L13 16V3H16V13ZM18.81 12.81L17 11H22V16L20.21 14.21L13 21.36L9.53 18.34L5.75 22H3L9.47 15.66L13 18.64" fill="black"/>
            </svg>
            Grafik Stok
        </a>
        </li>
        
        <li>
        <a href="pengaturan.php" class="nav-link link-dark">
            <!-- <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg> -->
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.0001 15.5C11.0718 15.5 10.1816 15.1313 9.52521 14.4749C8.86883 13.8185 8.50008 12.9283 8.50008 12C8.50008 11.0717 8.86883 10.1815 9.52521 9.52513C10.1816 8.86875 11.0718 8.5 12.0001 8.5C12.9283 8.5 13.8186 8.86875 14.475 9.52513C15.1313 10.1815 15.5001 11.0717 15.5001 12C15.5001 12.9283 15.1313 13.8185 14.475 14.4749C13.8186 15.1313 12.9283 15.5 12.0001 15.5ZM19.4301 12.97C19.4701 12.65 19.5001 12.33 19.5001 12C19.5001 11.67 19.4701 11.34 19.4301 11L21.5401 9.37C21.7301 9.22 21.7801 8.95 21.6601 8.73L19.6601 5.27C19.5401 5.05 19.2701 4.96 19.0501 5.05L16.5601 6.05C16.0401 5.66 15.5001 5.32 14.8701 5.07L14.5001 2.42C14.4798 2.30222 14.4184 2.19543 14.3269 2.11855C14.2354 2.04168 14.1196 1.99968 14.0001 2H10.0001C9.75008 2 9.54008 2.18 9.50008 2.42L9.13008 5.07C8.50008 5.32 7.96008 5.66 7.44008 6.05L4.95008 5.05C4.73008 4.96 4.46008 5.05 4.34008 5.27L2.34008 8.73C2.21008 8.95 2.27008 9.22 2.46008 9.37L4.57008 11C4.53008 11.34 4.50008 11.67 4.50008 12C4.50008 12.33 4.53008 12.65 4.57008 12.97L2.46008 14.63C2.27008 14.78 2.21008 15.05 2.34008 15.27L4.34008 18.73C4.46008 18.95 4.73008 19.03 4.95008 18.95L7.44008 17.94C7.96008 18.34 8.50008 18.68 9.13008 18.93L9.50008 21.58C9.54008 21.82 9.75008 22 10.0001 22H14.0001C14.2501 22 14.4601 21.82 14.5001 21.58L14.8701 18.93C15.5001 18.67 16.0401 18.34 16.5601 17.94L19.0501 18.95C19.2701 19.03 19.5401 18.95 19.6601 18.73L21.6601 15.27C21.7801 15.05 21.7301 14.78 21.5401 14.63L19.4301 12.97Z" fill="black"/>
            </svg>
            Pengaturan
        </a>
        </li>
        <li>
        <a href="logout.php"  type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="nav-link link-dark">
            <!-- <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg> -->
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16 17V14H9V10H16V7L21 12L16 17ZM14 2C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6H14V4H5V20H14V18H16V20C16 20.5304 15.7893 21.0391 15.4142 21.4142C15.0391 21.7893 14.5304 22 14 22H5C4.46957 22 3.96086 21.7893 3.58579 21.4142C3.21071 21.0391 3 20.5304 3 20V4C3 3.46957 3.21071 2.96086 3.58579 2.58579C3.96086 2.21071 4.46957 2 5 2H14Z" fill="black"/>
            </svg>
            Keluar
        </a>
        </li>
    </ul>
    <hr>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Peringatan!</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            '.$_SESSION['nama_pengguna'].', Yakin kamu mau keluar?
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <a type="button" href="logout.php" class="btn btn-primary">Ya, saya yakin</a>
            </div>
        </div>
        </div>
    </div>
    ';
    } else {
    echo 'gagal';
    }
    ?>
      
    <!-- Content -->
    <div class="bg-light rounded col-8">
        
    <div class="card shadow mb-4">
      <div class="card-header">
          <div class="d-sm-flex align-items-center justify-content-between">
              <h4 class="m-0 font-weight-bold">Data Laporan</h4>
              <a href="tambah-laporan.php" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                  Tambah
              </a>
          </div>
      </div>

      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered display" id="example" width="100%" cellspacing="0">
          <thead>
              <tr>
                  <th scope="col">No.</th>
                  <th scope="col">ID Stok Keluar</th>
                  <th scope="col">Nama Bahan Baku</th>
                  <th scope="col">Jumlah</th>
                  <th scope="col">Keterangan</th>
                  <th scope="col">Aksi</th>
              </tr>
          </thead>
          <tbody>
              <?php 
              $dataLaporan = mysqli_query($conn, "SELECT stok_keluar.id as `id_stok_keluar`, stok_keluar.nama, laporan.id, laporan.jumlah, laporan.keterangan FROM laporan JOIN stok_keluar ON laporan.id_stok_keluar = stok_keluar.id");
              
              $i = 1;
              foreach( $dataLaporan as $row ) :
              ?>
              <tr>
                  <td scope="row"><?= $i++; ?></td>
                  <td scope="row"><?= $row["id_stok_keluar"]; ?></td>
                  <td scope="row"><?= $row["nama"]; ?></td>
                  <td scope="row"><?= $row["jumlah"]; ?></td>
                  <td scope="row"><?= $row["keterangan"]; ?></td>
                  <td scope="row">
                      <a type="button" href="#ubah-laporan.php?id=<?= $row["id"]; ?>" class="btn btn-primary" >Ubah</a>
                      <a type="button" href="hapus-laporan.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?');" class="btn btn-danger">Hapus</a>
                  </td>
              </tr>
              <?php endforeach; ?>
          </tbody>
          </table>
        </div>
      </div>

    </div>

    </div>
    </div>

    <!-- <script src="vendor/twbs/bootstrap/dist/js/jquery/jquery.min.js"></script> -->
    <script src="vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script src="vendor/js/datatables.js"></script>

</body>
</html>