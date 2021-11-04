  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Barang Order</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= $admin_url ?>main.php?pages=home">Home</a></li>
              <li class="breadcrumb-item active">Order</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="col-12">
<!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Form Detail Order</h3>
              </div>
              <div class="card-body">
    <?php
    error_reporting(0);
    $edit = mysqli_query($koneksi, "SELECT * FROM orders,kustomer WHERE orders.id_kustomer=kustomer.id_kustomer AND id_orders='$_GET[id_order]'");
    $r    = mysqli_fetch_array($edit);
    
    if ($r['status_order']=='Baru'){
        $pilihan_status = array('Baru', 'Lunas');
    }
    elseif ($r['status_order']=='Lunas'){
        $pilihan_status = array('Lunas', 'Batal');    
    }
    else{
        $pilihan_status = array('Baru', 'Lunas', 'Batal');    
    }

    $pilihan_order = '';
    foreach ($pilihan_status as $status) {
	   $pilihan_order .= "<option value=$status";
	   if ($status == $r['status_order']) {
		    $pilihan_order .= " selected";
	   }
	   $pilihan_order .= ">$status</option>\r\n";
    }

    echo "<br>
          <form method=POST action=main.php?pages=aksi_order&act=update>
          <input type=hidden name=id value=$r[id_orders]>

          <table border='1' cellpadding='10' cellspacing='0'>
          <tr><td>No. Order</td>        <td> : $r[id_orders]</td></tr>
          <tr><td>Tgl. & Jam Order</td> <td> : $r[tgl_order] & $r[jam_order]</td></tr>
          <tr><td>Status Order      </td><td>: <select name=status_order>$pilihan_order</select> 
          <input type=submit value='Ubah Status'></td></tr>
          </table></form>
          <br>";

  // tampilkan rincian produk yang di order
  $sql2=mysqli_query($koneksi, "SELECT * FROM orders_detail, produk 
                     WHERE orders_detail.id_produk=produk.id_produk 
                     AND orders_detail.id_orders='$_GET[id_order]'");
  
  echo "<table class='table' border='1' cellpadding='10' cellspacing='0'> <thead class='thead-dark'>
        <tr><th>Nama Produk</th><th>Berat(kg)</th><th>Jumlah</th><th>Harga Satuan</th><th>Sub Total</th></tr>
        </thead>";
  
  while($s=mysqli_fetch_array($sql2)){
     // rumus untuk menghitung subtotal dan total		
   $disc        = ($s['diskon']/100)*$s['harga'];
   $hargadisc   = number_format(($s['harga']-$disc),0,",","."); 
   $subtotal    = ($s['harga']-$disc) * $s['jumlah'];

    $total       = $total+$subtotal;
    $subtotal_rp = number_format($subtotal,0,",",".");    
    $total_rp    = number_format($total,0,",",".");    
    $harga       = number_format($s['harga'],0,",",".");

   $subtotalberat = $s['berat'] * $s['jumlah']; // total berat per item produk 
   $totalberat  = $totalberat + $subtotalberat; // grand total berat all produk yang dibeli

    echo "<tr><td>$s[nama_produk]</td><td align=center>$s[berat]</td><td align=center>$s[jumlah]</td>
              <td align=right>$harga</td><td align=right>$subtotal_rp</td></tr>";
  }

  $ongkos=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM kota,kustomer,orders 
          WHERE kustomer.id_kota=kota.id_kota AND orders.id_kustomer=kustomer.id_kustomer AND id_orders='$_GET[id_order]'"));
  $ongkoskirim1=$ongkos['ongkos_kirim'];
  $ongkoskirim=$ongkoskirim1 * $totalberat;

  $grandtotal    = $total + $ongkoskirim; 

  $ongkoskirim_rp = number_format($ongkoskirim,0,",",".");
  $ongkoskirim1_rp = number_format($ongkoskirim1,0,",","."); 
  $grandtotal_rp  = number_format($grandtotal,0,",",".");   

echo "<tr><td colspan=4 align=right>Total              Rp. : </td><td align=right><b>$total_rp</b></td></tr>
      <tr><td colspan=4 align=right>Ongkos Kirim       Rp. : </td><td align=right><b>$ongkoskirim1_rp</b>/Kg</td></tr>      
      <tr><td colspan=4 align=right>Total Berat            : </td><td align=right><b>$totalberat</b> Kg</td></tr>      
      <tr><td colspan=4 align=right>Total Ongkos Kirim Rp. : </td><td align=right><b>$ongkoskirim_rp</b></td></tr>      
      <tr><td colspan=4 align=right>Grand Total        Rp. : </td><td align=right><b>$grandtotal_rp</b></td></tr>
      </table>
      <br>";

  // tampilkan data kustomer
  echo "<table class='table' border='1' cellpadding='10' cellspacing='0'> <thead class='thead-dark'>
        <tr><th colspan='2'>Data Kustomer</th></tr> </thead>
        <tr><td>Nama Kustomer</td><td> : $r[nama_lengkap]</td></tr>
        <tr><td>Alamat Pengiriman</td><td> : $r[alamat]</td></tr>
        <tr><td>No. Telpon/HP</td><td> : $r[telpon]</td></tr>
        <tr><td>Email</td><td> : $r[email]</td></tr>
        </table>";
        ?>
          </div>
        </div><!-- /.container-fluid -->
    <!-- /.content -->
  </div>