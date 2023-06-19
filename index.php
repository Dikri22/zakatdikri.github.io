<?php
require 'kudulogin.php';
?>
<html>
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Capriola&display=swap" rel="stylesheet">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="bootstrap-5.3.0-alpha3-dist/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
<script src="https://kit.fontawesome.com/e3e51e51f5.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
  <script src="bootstrap-5.3.0-alpha3-dist/js/bootstrap.bundle.min.js"></script>
  <script>
  $(document).ready(function () {
    $('#tabel_muzakki').DataTable();
});
</script>
    <title>Zakat Hayu</title>
    <style>
      body{
        background-color: #white;
        font-family: 'Capriola', sans-serif;
      }
    </style>
</head>
<body>
  <div class="container-fluid">
    <img src="bg.png" class="img-fluid" alt="...">
<nav class="navbar navbar-expand-lg fixed-top" data-bs-theme="light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#" style="font-size: 2.3em; font-weight: bold; padding-left: 15px;">ZAKAT FITRAH</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end"  id="navbarSupportedContent">
      <ul class="nav nav-underline">
        <li class="nav-item" style="margin-right: 20px; font-size: 1.1em; color: black;">
    <a class="nav-link link-dark" href="index.php">Home</a>
  </li>
  <li class="nav-item dropdown"style="margin-right: 20px; font-size: 1.1em;">
    <a class="nav-link link-dark dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Master Data</a>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="muzakki.php">Muzakki</a></li>
      <li><a class="dropdown-item" href="mustahik.php">Mustahik</a></li>
    </ul>
  </li>
    <li class="nav-item" style="margin-right: 20px; font-size: 1.1em;">
    <a class="nav-link link-dark" href="bayarzakat.php">Bayar Zakat</a>
  </li>
  <li class="nav-item dropdown"style="margin-right: 20px; font-size: 1.1em;">
    <a class="nav-link link-dark dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Distribusi Zakat</a>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="dwarga.php">Distribusi Warga</a></li>
      <li><a class="dropdown-item" href="dmustahik.php">Distribusi Mustahik</a></li>
    </ul>
  </li>
  <li class="nav-item" style="margin-right: 20px; font-size: 1.1em;">
    <a class="nav-link link-dark" href="laporan.php">Laporan</a>
  </li>
  <li class="nav-item" style="margin-right: 20px; font-size: 1.1em;">
    <a class="nav-link link-dark" href="about.php">About</a>
  </li>
  <li class="nav-item" style="margin-right: 20px; font-size: 1.1em;">
    <button type="button" class="btn btn-danger" onclick="location.href='logout.php'">Log Out</button>
  </li>
</ul>
    </div>
  </div>
</nav>
</div>
<!-- Tampilkan jumlah muzakki -->
<?php
      $get = mysqli_query($c,"select * from muzakki");
      $hitungmuzakki = mysqli_num_rows($get);
?>
<!-- Tampilkan total uang terkumpul -->
<?php
      $hitungjumlahuang = mysqli_query($c,"SELECT SUM(bayar_uang) FROM bayarzakat");
      $totaluang = mysqli_fetch_array($hitungjumlahuang);
?>
<!-- Tampilkan total beras terkumpul -->
<?php
      $hitungjumlahberas = mysqli_query($c,"SELECT SUM(bayar_beras) FROM bayarzakat");
      $totalberas = mysqli_fetch_array($hitungjumlahberas);
?>
<!-- Tampilkan jumlah mustahik -->
<?php
      $total = 0;
      $getmlainnya = mysqli_query($c,"select * from mustahik_lainnya");
      $getmwarga = mysqli_query($c,"select * from mustahik_warga");
      $hitungmlainnya = mysqli_num_rows($getmlainnya);
      $hitungmwarga = mysqli_num_rows($getmwarga);
      $total = $total += $hitungmwarga += $hitungmlainnya
?>
<?php
      $hargaberas = 45000;
      $beratberas = 2.5;
      $hitungberas = mysqli_query($c,"SELECT SUM(bayar_beras) FROM bayarzakat");
      $beras = mysqli_fetch_array($hitungberas);

      $hitunguang = mysqli_query($c,"SELECT SUM(bayar_uang) FROM bayarzakat");
      $uang = mysqli_fetch_array($hitunguang);

      $rataperkilo = $hargaberas / $beratberas;
      $ratarata = $uang[0] / $rataperkilo;

      $terakhir = $beras[0] + $ratarata;
?>
<!-- Section -->
<!-- Card 1 -->
<section class=" ">
<div class="container mb-5">
  <div class="row text-center g-4">

    <div class="col-md">
<div class="card border-white shadow" style="background: transparent;">
  <div class="card-body">
    <h5 class="card-title" style="font-weight:bold;">JUMLAH MUZAKKI</h5>
    <h6 class="card-subtitle mb-2 text-body-secondary"><hr style="color: white;"></h6>
    <p class="card-text h2" style="font-weight:bold;"><?=$hitungmuzakki;?></p>
  </div>
</div>
</div>

<div class="col-md">
<div class="card border-white shadow" style="background: transparent;">
  <div class="card-body">
    <h5 class="card-title"  style="font-weight:bold;">TOTAL UANG</h5>
    <h6 class="card-subtitle mb-2 text-body-secondary">Terkumpul dari muzakki</h6>
    <p class="card-text h2" style="font-weight: bold;">Rp.<?=number_format($totaluang[0], 0, ',', '.')?></p>
  </div>
</div>
</div>

<div class="col-md">
<div class="card border-white shadow" style="background: transparent;">
  <div class="card-body">
    <h5 class="card-title"  style="font-weight:bold;">TOTAL BERAS</h5>
    <h6 class="card-subtitle mb-2 text-body-secondary">Terkumpul dari Muzakki</h6>
    <p class="card-text h2" style="font-weight: bold;"><?=$totalberas[0]?> Kg</p>
</div>
</div>
</div>


    <div class="col-md">
    <div class="card border-white shadow" style="background: transparent;">
    <div class="card-body">
    <h5 class="card-title" style="font-weight:bold;">JUMLAH MUSTAHIK</h5>
    <h6 class="card-subtitle mb-2 text-body-secondary">Mustahik & Warga</h6>
    <p class="card-text h2" style="font-weight: bold;"><?=$total;?></p>
  </div>
</div>
</div>

<div class="col-md">
<div class="card border-white shadow" style="background: transparent;">
  <div class="card-body">
    <h5 class="card-title" style="font-weight:bold;">TOTAL BERAS</h5>
    <h6 class="card-subtitle mb-2 text-body-secondary">+ Dikonversi dari uang</h6>
    <p class="card-text h2" style="font-weight:bold;"><?=number_format($terakhir, 1, '.', '')?> Kg</p>
  </div>
</div>
</div>

</div>
</div>
</section>
<!--EndSection-->
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


<footer class="bg-light text-center text-white">
  <!-- Grid container -->
  <div class="container p-4 pb-0">
    <!-- Section: Social media -->
    <section class="mb-4">
      <!-- Facebook -->
      <a
        class="btn text-white btn-floating m-1"
        style="background-color: #3b5998;"
        href="https://www.facebook.com/dikri.maulana.9235"
        role="button"
        ><i class="fab fa-facebook-f"></i
      ></a>

      <!-- Twitter -->
      <a
        class="btn text-white btn-floating m-1"
        style="background-color: #55acee;"
        href="#!"
        role="button"
        ><i class="fab fa-twitter"></i
      ></a>

      <!-- Instagram -->
      <a
        class="btn text-white btn-floating m-1"
        style="background-color: #ac2bac;"
        href="https://www.instagram.com/_dikrii/"
        role="button"
        ><i class="fab fa-instagram"></i
      ></a>
      <!-- Github -->
      <a
        class="btn text-white btn-floating m-1"
        style="background-color: #333333;"
        href="https://github.com/Dikri22"
        role="button"
        ><i class="fab fa-github"></i
      ></a>
    </section>
    <!-- Section: Social media -->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2023 Copyright:
    <a class="text-white" href="https://mdbootstrap.com/">Dikri Maulana</a>
  </div>
  <!-- Copyright -->
</footer>
</body>
</html>