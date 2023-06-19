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
    <title>Bayar Zakat</title>
    <style>
      body{
        font-family: 'Capriola', sans-serif;
        background-color: white;
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
<div class="container-fluid"  style="width:100%; height:75vh;">
<div class="container-fluid p-2" style="background-color: #95d5b2"><h3 style="font-weight: bold; padding-left: 15px;">DATA BAYAR ZAKAT</h3> </div>
<div class="container-fluid p-4 shadow" style="padding-bottom: 20px; padding-top: 20px;">
  <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#myModalTambah">+ Tambah Data</button><br><br>
  <table id="tabel_muzakki" class="table table-striped ">
        <thead style=" color: black; font-size: 0.8em;" >
          <tr>
              <th class="text-center">No</th>
                                            <th class="text-center">Nama KK</th>
                                            <th class="text-center">Jumlah Tanggungan</th>
                                            <th class="text-center">Jenis Bayar</th>
                                            <th class="text-center">Jumlah Tanggungan Yang Dibayar</th>
                                            <th class="text-center">Bayar Beras</th>
                                            <th class="text-center">Bayar Uang</th>
                                            <th class="text-center">Pembayaran</th>
                                            <th class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody style="color: black; font-size: 0.9em;">
          <?php 
                                        $get = mysqli_query($c,"select * from bayarzakat b, muzakki m where b.id_muzakki=m.id_muzakki");
                                        $i = 1;
                                        $total_bayar_beras = 0;
                                        $total_bayar_uang = 0;
                                        while($p=mysqli_fetch_array($get)){
                                            $namakk = $p['nama_KK'];
                                            $jt = $p['jumlah_tanggungan'];
                                            $jenisbayar = $p['jenis_bayar'];
                                            $jtyd = $p['jumlah_tanggunganyangdibayar'];
                                            $bayarberas = $p['bayar_beras'];
                                            $bayaruang = $p['bayar_uang'];
                                            $idmuzakki = $p['id_muzakki'];
                                            $namamuzakki = $p['nama_muzakki'];
                                            $idzakat  = $p['id_zakat'];
                                            $pembayaran =$p['pembayaran'];
                                            
                                        

                                            if ($jenisbayar == 'beras') {
                                                $total_bayar_beras += $bayarberas;
                                            }
                                            
                                            
                                            if ($jenisbayar == 'uang') {
                                                $total_bayar_uang += $bayaruang;
                                            }
                                            

                                        
                                    ?>


                        <tr>
                         <td class="text-center"><?=$i++;?></td>
                                            <td><?=$namakk;?></td>
                                            <td class="text-center"><?=$jt;?></td>
                                            <td class="text-center"><?=$jenisbayar;?></td>
                                            <td class="text-center"><?=$jtyd;?></td>
                                            <td class="text-center"><?=$bayarberas;?> Kg</td>
                                            <td class="text-center">Rp <?=number_format($bayaruang,0, ',', '.');?></td>
                                            <td class="text-center">
                                                   <?=$pembayaran;?>
                        <td class="text-center">
                          <button type="button" class="btn btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#edit<?=$idzakat;?>">Edit</button> | 
                          <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete<?=$idzakat;?>">Hapus</button>
                        </td>
                        </tr>
                                        
                    

<!-- The Modal edit -->
                                        <div class="modal fade" id="edit<?=$idzakat;?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit Bayar Zakat</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>

                                            <form method="post">

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                Nama KK
                                                <select name="idmuzakki" class="form-control mb-2" searchable="true" value="<?=$idmuzakki;?>" readonly>
                                                <option value="<?=$idmuzakki;?>"><?=$namamuzakki;?> - <?=$jt;?></option>
                                                    
                                                <?php

                                                $getmuzakki = mysqli_query($c,"select muzakki.id_muzakki, muzakki.nama_muzakki, muzakki.jumlah_tanggungan from muzakki left join bayarzakat on muzakki.id_muzakki = bayarzakat.id_muzakki where bayarzakat.id_muzakki is null");

                                                while($nm=mysqli_fetch_array($getmuzakki)){
                                                $namamuzakki = $nm['nama_muzakki'];
                                                $jt = $nm['jumlah_tanggungan'];
                                                $idmuzakki = $nm['id_muzakki'];
                                            

                                                ?>


                                                
                                               

                                                <?php
                                                };
                                                ?>



                                                </select>
                                                Jenis Bayar
                                                <select name="jenisbayar" class="form-control mb-2 " value="<?=$jenisbayar;?>" required>
                                                    <option value="<?=$jenisbayar;?>"><?=$jenisbayar;?></option>
                                                    <option value="beras">Beras</option>
                                                    <option value="uang">Uang</option>
                                                </select>
                                                Jumlah Tanggungan Yang Dibayar
                                                <input type="number" name="jtyd" class="form-control mb-2" placeholder="Jumlah Tanggungan Yang Dibayar" value="<?=$jtyd;?>" required>

                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success" name="editbayarzakat">Edit</button>
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
                                            </div>

                                            </form>

                                            </div>
                                        </div>
                                    </div>

                                          <!-- The Modal hapus -->
                                        <div class="modal fade" id="delete<?=$idzakat;?>">
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
                                            <input type="hidden" name="idzakat" value="<?=$idzakat;?>">
                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success" name="hapusbayarzakat">Ya</button>
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
<div class="modal fade" id="myModalTambah">
                <div class="modal-dialog">
                    <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Pembayaran Zakat</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <form method="post">

                    <!-- Modal body -->
                    <div class="modal-body">
                        <select name="idmuzakki" class="form-control mt-2" searchable="true" required>
                        <option value="">-- Pilih Nama Muzakki - Jumlah Tanggungan --</option>
                            
                        <?php

                        $getmuzakki = mysqli_query($c,"select muzakki.id_muzakki, muzakki.nama_muzakki, muzakki.jumlah_tanggungan from muzakki left join bayarzakat on muzakki.id_muzakki = bayarzakat.id_muzakki where bayarzakat.id_muzakki is null");

                        while($nm=mysqli_fetch_array($getmuzakki)){
                        $namamuzakki = $nm['nama_muzakki'];
                        $jt = $nm['jumlah_tanggungan'];
                        $idmuzakki = $nm['id_muzakki'];
                       

                        ?>


                        
                        <option value="<?=$idmuzakki;?>"><?=$namamuzakki;?> - <?=$jt;?></option>

                        <?php
                         };
                        ?>



                        </select>
                         <select name="jenisbayar" class="form-control mt-2 " required >
                            <option value="">-- Pilih Jenis Bayar --</option>
                            <option value="beras">Beras</option>
                            <option value="uang">Uang</option>
                         </select>
                         
                         <input type="number" name="jtyd" class="form-control mt-2" placeholder="Jumlah Tanggungan Yang Dibayar" required>
                         <select name="pembayaran" class="form-control mb-2 mt-2" required>
                                                    <option value="">-- Pilih Pembayaran --</option>
                                                    <option value="Sudah Bayar">Sudah</option>
                                                    <option value="Belum Bayar">Belum</option>
                                                </select>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" name="bayarzakat">Simpan</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
                    </div>

                    </form>

                    </div>
                </div>
             </div>



</html>