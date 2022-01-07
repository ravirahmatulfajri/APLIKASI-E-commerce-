<?php
include "../../../lib/config.php";
include "../../../lib/koneksi.php";

?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  </head>
  <body>
  '<div class="card">
              <div class="card-header">
                <h1 class="card-title" align="center">Daftar Customer</h1><br>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table border="1" cellpadding="10" cellspacing="0">
                    <tr>
                      <td><b>No</b></td>
                      <td><b>Nama Lengkap</b></td>
                      <td><b>Alamat</b></td>
                      <td><b>Email</b></td>
                      <td><b>Telpon</b></td>
                    </tr>
                     
                    <?php										
					          $no=0;
					          $kueri = mysqli_query($koneksi, "SELECT * FROM kustomer");
					          while ($data = mysqli_fetch_array($kueri)){
					          $no++;?>
					 
                    <tr>
                      <td><?php echo"$no" ?></td>
                      <td><?php echo"$data[nama_lengkap]" ?></td>
                      <td><?php echo"$data[alamat]" ?></td>
                      <td><?php echo"$data[email]" ?></td>
                      <td><?php echo"$data[telpon]" ?></td>
                    </tr>
					
					          <?php }?>
                </table>
              </div>'
  </body>
  </html>

<?php

require_once __DIR__ . './vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
$cetak = ob_get_contents();
ob_clean();
$mpdf->WriteHTML($cetak);
$mpdf->Output('Detail_Transaksi_Account.pdf', 'I');

?>