<?php
require 'kudulogin.php';
?>
<html>
<head>
  <title>Data Laporan Pembayaran Zakat</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
<div class="container">
      <h2>Data Laporan Pembayaran Zakat</h2>
      <h4>APLIKASI ZAKAT</h4>
        <div class="data-tables datatable-dark">
          
                <table class="table table-bordered border-dark" id="mauexport">
                                    <thead>
                                        <tr align="center">
                                            <th>No</th>
                                            <th>Nama KK</th>
                                            <th>Jumlah Tanggungan</th>
                                            <th>Jenis Bayar</th>
                                            <th>Jumlah Tanggungan Yang Dibayar</th>
                                            <th>Bayar Beras</th>
                                            <th>Bayar Uang</th>
                                            <th>Pembayaran</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>

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
                                    


                                        <tr align="center">
                                            <td><?=$i++;?></td>
                                            <td><?=$namakk;?></td>
                                            <td><?=$jt;?></td>
                                            <td><?=$jenisbayar;?></td>
                                            <td><?=$jtyd;?></td>
                                            <td><?=$bayarberas;?> Kg</td>
                                            <td>Rp <?=number_format($bayaruang,0, ',', '.');?></td>
                                            <td>
                                                   <?=$pembayaran;?>
                                            </td>
                                            
                                        </tr>

                                        <?php
                                        }
                                        ?>

                                    

                                    </tbody>
                                </table>
                                

                           
                                
          
        </div>
</div>
  
<script>
$(document).ready(function() {
    $('#mauexport').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy','csv','excel', 'pdf', 'print'
        ]
    } );
} );

</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

  

</body>

</html>