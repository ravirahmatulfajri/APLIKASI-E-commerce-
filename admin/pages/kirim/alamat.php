<?php
include "../../../lib/config.php";
include "../../../lib/koneksi.php";

$customer = mysqli_query($koneksi, "SELECT * FROM orders,kustomer WHERE orders.id_kustomer=kustomer.id_kustomer AND id_orders='$_GET[id_order]'");
$r    = mysqli_fetch_array($customer);

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
  <div class="card">
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table align="Left">
                    <tr>
                      <td>Nama Pengirim </td>
                      <td>: Plaza Agro UGM</td>
                    </tr>
                    <tr>
                      <td>Alamat Pengirim </td>
                      <td>: Jl. Agro Karangmalang, Caturtunggal Depok Sleman di jalur masuk timur berada di area Fakultas Peternakan, Sleman, Yogyakarta 55281</td>
                    </tr>
                    <tr>
                      <td>Tlp. Pengirim </td>
                      <td>: 0853-139-10-200</td>
                    </tr>
                    <tr><td> </td></tr><tr><td> </td></tr><tr><td> </td></tr><tr><td> </td></tr>
                    <tr>
                      <td>Nama Kustomer </td>
                      <td>: <?php echo"$r[nama_lengkap]" ?></td>
                    </tr>
                    <tr>
                      <td>Alamat Penerima </td>
                      <td>: <?php echo"$r[alamat]" ?></td>
                    </tr>
                    <tr>
                      <td>Telpon/HP Penerima</td>
                      <td>: <?php echo"$r[telpon]"?></td>
                    </tr>
                    <tr>
                      <td>Email </td>
                      <td>: <?php echo"$r[email]"?></td>
                    </tr>
                    <tr>
                      <td>Barang </td>
                      <td>:</td>
                    </tr>
                    <?php										
					          $no=0;
					          $kueri = mysqli_query($koneksi, "SELECT * FROM orders_detail, produk WHERE orders_detail.id_produk=produk.id_produk AND orders_detail.id_orders='$_GET[id_order]'");
					          while ($data = mysqli_fetch_array($kueri)){
					          $no++;?>
					 
                    <tr>
                      <td></td>
                      <td><?php echo"$no" ?> . <?php echo"$data[nama_produk]" ?></td>
                    </tr>
					
					          <?php }?>
                </table>
              </div>
  </body>
  </html>

<?php

require_once __DIR__ . './vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A6-L', 'default_font_size' => 8]);
$cetak = ob_get_contents();
ob_clean();
$mpdf->WriteHTML($cetak);
$mpdf->Output('Alamat_Transaksi_Account.pdf', 'I');

?>