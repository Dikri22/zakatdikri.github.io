<?php
require 'kudulogin.php';
?>
<html>
<head>
  <title>Data Laporan Distribusi Warga</title>
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
      <h2>Data Laporan Distribusi Warga</h2>
      <h4>APLIKASI ZAKAT</h4>
        <div class="data-tables datatable-dark">
          
                <table id="mauexport" class="table table-bordered border-dark">
        <thead style=" color: black; font-size: 1.1em;" >
          <tr align="center">
                                            <th>Kategori</th>
                                            <th>jumlah Hak</th>
                                            <th>jumlah KK</th>
                                            <th>Total beras</th>
                                        </tr>
        </thead>
        <tbody style="color: black; font-size: 1.1em;">
         <?php
$get = "SELECT kategori,hak_beras, COUNT(id_mustahikwarga) AS jumlah_kk, SUM(hak_beras) AS total_beras FROM mustahik_warga WHERE kategori IN ('fakir', 'miskin', 'mampu') GROUP BY kategori";
if ($result = $c->query($get)) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['kategori'] . "</td>";
        echo "<td>" . getHakBeras($row['kategori']) . "</td>";
        echo "<td>" . $row['jumlah_kk'] . "</td>";
        echo "<td>" . $row['total_beras'] . " Kg"."</td>";
        echo "</tr>";
    }
}

// Fungsi untuk mendapatkan hak beras berdasarkan kategori mustahik
function getHakBeras($kategori)
{
    if ($kategori == 'fakir' || $kategori == 'miskin') {
        return 2;
    } else if ($kategori == 'mampu') {
        return 1;
    } else {
        return 0;
    }
}
?>
                                        
                </tbody>
      </table>
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