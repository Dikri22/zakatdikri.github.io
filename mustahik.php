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
    $('#tabel_muzakki').DataTable({
    pageLength : 5,
    lengthMenu : [[5,10,20,-1],[5,10,20,"All"]],

    });
    
});
</script>
    <title>Data Mustahik</title>
        <style>
      body{
        font-family: 'Capriola', sans-serif;
        background-color: #white;
      }
    </style>

</head>
<body>
<nav class="navbar navbar-expand-lg shadow" data-bs-theme="light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#" style="font-size: 2em; font-weight: bold; padding-left: 15px;">ZAKAT FITRAH</a>
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
<div class="container-fluid" style="width:100%; height:75vh;">
<div class="container-fluid p-2" style="background-color: #95d5b2"><h3 style="font-weight: bold; padding-left: 15px;">DATA MUSTAHIK</h3> </div>
<div class="container-fluid p-4 shadow" style="padding-bottom: 20px; padding-top: 20px;">
  <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#myModalTambah">+ Tambah Data</button><br><br>
  <table id="tabel_muzakki" class="table table-striped ">
        <thead style=" color: black; font-size: 1.2em;" >
          <tr class="text-center">
             <th class="text-center">NO</th>
             <th class="text-center">ID KATEGORI</th>
                         <th class="text-center">NAMA KATEGORI</th>
                         <th class="text-center">JUMLAH HAK</th>
                         <th class="text-center">AKSI</th>
          </tr>
        </thead>
        <tbody style="color: black; font-size: 1.1em;">
          <?php 
                        $get = mysqli_query($c,"select * from kategori_mustahik");
                        $i = 1;
                        while($p=mysqli_fetch_array($get)){
                        $id = $p['id_kategori'];
                        $kategori = $p['nama_kategori'];
                        $jh = $p['jumlah_hak'];
          ?>


                        <tr>
                        <td class="text-center"><?=$i++;?></td>
                        <td class="text-center"><?=$id;?></td>
                        <td><?=$kategori;?></td>
                        <td><?=$jh;?></td>
                        <td class="text-center">
                          <button type="button" class="btn btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#edit<?=$id;?>">Edit</button> | 
                          <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapus<?=$id;?>">Hapus</button>
                        </td>
                        </tr>
                                        
                    
 <!-- The Modal -->
                <div class="modal fade" id="myModalTambah">
                <div class="modal-dialog">
                    <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Data Mustahik</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <form method="post">

                    <!-- Modal body -->
                    <div class="modal-body">
                        <input type="text" name="kategori" class="form-control mt-2" placeholder="Nama Kategori" required >
                        <input type="number" name="jumlahhak" class="form-control mt-2" placeholder="Jumlah Hak" required >
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" name="tambahmustahik">Simpan</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
                    </div>

                    </form>

                    </div>
                </div>
             </div>

 <!-- The Modal edit -->
                                            <div class="modal fade" id="edit<?=$id;?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit Data Mustahik</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>

                                                <form method="post">

                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                <div style="font-weight: bold;">
                                                    Kategori Mustahik
                                                    </div>
                                                    <select name="mustahik" class="form-control mb-2" id="" value="<?=$kategori;?>" readonly>
                                                        <option value="<?=$kategori;?>"><?=$kategori;?></option>
                                                        <option value="Amil">Amil</option>
                                                        <option value="Mualaf">Muallaf</option>
                                                        <option value="Fisabilillah">Fisabilillah</option>
                                                        <option value="Ibnu Sabil">Ibnu Sabil</option>
                                                        <option value="Fakir">Fakir</option>
                                                        <option value="Miskin">Miskin</option>
                                                        <option value="Gharim">Gharim</option>
                                                        <option value="Riqab">Riqab</option>
                                                    </select>
                                                    <div style="font-weight: bold;">
                                                    Jumlah Hak
                                                    </div>
                                                    <input type="number" name="jumlahhak" class="form-control" placeholder="Jumlah Hak" value="<?=$jh;?>" required >
                                                </div>
                                                <input type="hidden" name="editidkategori" value="<?=$id;?>">

                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success" name="editmustahik">Edit</button>
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                </div>

                                                </form>

                                                </div>
                                            </div>
                                        </div>

                                           <!-- The Modal hapus -->
                                        <div class="modal fade" id="hapus<?=$id;?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Hapus</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>

                                            <form method="post">

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                            Apakah Anda yakin ingin menghapus??
                                            <input type="hidden" name="idmustahik" value="<?=$id;?>">
                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success" name="hapusmustahik">Ya</button>
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tidak</button>
                                            </div>

                                            </form>

                                            </div>
                                        </div>
                                    </div>
                    <?php
                    };
                    ?>
                </tbody>
      </table>
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