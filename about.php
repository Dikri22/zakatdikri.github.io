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
    <title>Tentang Saya</title>
    <style>
      body{
        background-color: white;
        font-family: 'Capriola', sans-serif;
      }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg" data-bs-theme="light">
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

<div class="container-fluid" style="width:100%; height:70vh;">
<div class="position-absolute top-50 start-50 translate-middle">
<div class="card mb-3 shadow" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="me.jpg" class="img-fluid rounded" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">DIKRI MAULANA</h5>
        <p class="card-text">Lakukan apapun yang menguntungkan bagi dirimu sendiri.</p>
        <p class="card-text"><small class="text-muted">Copyright © Dikri Maulana</small></p>
      </div>
    </div>
  </div>
</div>
</div>




</div>
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