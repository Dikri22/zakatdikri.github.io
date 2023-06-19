<?php
require 'kudulogin.php';
?>
<html>
<head>
  <title>Data Laporan Distribusi Mustahik</title>
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
      <h2>Data Laporan Distribusi Mustahik</h2>
      <h4>APLIKASI ZAKAT</h4>
        <div class="data-tables datatable-dark">
          
                <table id="mauexport" class="table table-bordered border-dark">        
    <thead style=" color: black; font-size: 1.1em;" >
          <tr align="center">
                                            <th>KATEGORI</th>
                                            <th>HAK</th>
                                            <th>JUMLAH KK</th>
                                            <th>TOTAL BERAS</th>
                                        </tr>
        </thead>
        <tbody style="color: black; font-size: 1.1em;">
          <?php
         $query = "SELECT kategori, hak, COUNT(nama) AS jumlah_kk, SUM(penerimaan) AS total_beras FROM mustahik_lainnya GROUP BY kategori";
$result = $c->query($query);

// Mengecek apakah terdapat data yang dihasilkan dari query
if ($result->num_rows > 0) {
    // Membuat tabel HTML


    // Mengambil data dari setiap baris hasil query
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['kategori'] . "</td>";
        echo "<td>" . $row['hak'] . "</td>";
        echo "<td>" . $row['jumlah_kk'] . "</td>";
        echo "<td>" . $row['total_beras'] . " Kg"."</td>";
        echo "</tr>";
    }

} else {
    echo "Tidak ada data yang ditemukan.";
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