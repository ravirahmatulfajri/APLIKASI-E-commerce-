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
  '<div class="card">
              <div class="card-header">
                <h1 class="card-title" align="center">INVOICE PLAZA AGRO</h1><br>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table align="Left">
                    <tr>
                      <td>Nama Kustomer </td>
                      <td>: <?php echo"$r[nama_lengkap]" ?></td>
                    </tr>
                    <tr>
                      <td>Alamat Pengiriman </td>
                      <td>: <?php echo"$r[alamat]" ?></td>
                    </tr>
                    <tr>
                      <td>No. Telpon/HP </td>
                      <td>: <?php echo"$r[telpon]"?></td>
                    </tr>
                    <tr>
                      <td>Email </td>
                      <td>: <?php echo"$r[email]"?></td>
                    </tr>
                </table>
                <h2>Daftar Barang Belanjaan</h2>
                <table border="1" cellpadding="10" cellspacing="0">
                    <tr>
                      <td><b>No</b></td>
                      <td><b>Nama Produk</b></td>
                      <td><b>Berat(kg)</b></td>
                      <td><b>Jumlah</b></td>
                      <td><b>Harga</b></td>
                      <td><b>Sub Total</b></td>
                    </tr>
                     
                    <?php										
					          $no=0;
					          $kueri = mysqli_query($koneksi, "SELECT * FROM orders_detail, produk WHERE orders_detail.id_produk=produk.id_produk AND orders_detail.id_orders='$_GET[id_order]'");
					          while ($data = mysqli_fetch_array($kueri)){
                      $disc        = ($data['diskon']/100)*$data['harga'];
                      $hargadisc   = number_format(($data['harga']-$disc),0,",","."); 
                      $dataubtotal    = ($data['harga']-$disc) * $data['jumlah'];

                      $total       = $total+$dataubtotal;
                      $dataubtotal_rp = number_format($dataubtotal,0,",",".");    
                      $total_rp    = number_format($total,0,",",".");    
                      $harga       = number_format($data['harga'],0,",",".");

                      $dataubtotalberat = $data['berat'] * $data['jumlah']; // total berat per item produk 
                      $totalberat  = $totalberat + $dataubtotalberat; // grand total berat all produk yang dibeli
					          $no++;?>
					 
                    <tr>
                      <td><?php echo"$no" ?></td>
                      <td><?php echo"$data[nama_produk]" ?></td>
                      <td><?php echo"$data[berat]" ?></td>
                      <td><?php echo"$data[jumlah]" ?></td>
                      <td><?php echo"$harga" ?></td>
                      <td><?php echo"$dataubtotal_rp" ?></td>
                    </tr>
					
					          <?php }?>
                </table><br>
                    <?php		
					          $ongkos=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM kota,kustomer,orders WHERE kustomer.id_kota=kota.id_kota AND orders.id_kustomer=kustomer.id_kustomer AND id_orders='$_GET[id_order]'"));
                    $ongkoskirim1=$ongkos['ongkos_kirim'];
                    $ongkoskirim=$ongkoskirim1 * $totalberat;
                    $grandtotal    = $total + $ongkoskirim;
                    $ongkoskirim_rp = number_format($ongkoskirim,0,",",".");
                    $ongkoskirim1_rp = number_format($ongkoskirim1,0,",","."); 
                    $grandtotal_rp  = number_format($grandtotal,0,",",".");
                    ?>
                <table align="right">
                    <tr>
                      <td>TOTAL</td>
                      <td>= Rp.<b><?= $total_rp; ?></b> </td>
                    </tr>
                    <tr>
                      <td>ONGKOS KIRIM </td>
                      <td>= Rp.<b><?= $ongkoskirim1_rp; ?></b></td>
                    </tr>
                    <tr>
                      <td>TOTAL BERAT </td>
                      <td>= <b><?= $totalberat; ?></b> Kg</td>
                    </tr>
                    <tr>
                      <td>TOTAL ONGKOS KIRIM </td>
                      <td>= Rp.<b><?= $ongkoskirim_rp; ?></b></td>
                    </tr>
                    <tr>
                      <td>GRAND TOTAL </td>
                      <td>= Rp.<b><?= $grandtotal_rp; ?></b></td>
                    </tr>
                </table>
              </div>'
  </body>
  </html>

<?php

require_once __DIR__ . './vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$cetak = ob_get_contents();
ob_clean();
$mpdf->WriteHTML($cetak);
$mpdf->Output('Detail_Transaksi_Account.pdf', 'I');

?>