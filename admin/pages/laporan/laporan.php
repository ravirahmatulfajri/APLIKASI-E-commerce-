<?php
switch($_GET['act']){
  // Tampil Order
  default:
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Laporan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= $admin_url ?>main.php?pages=home">Home</a></li>
              <li class="breadcrumb-item active">Laporan Order Lunas</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<div class="col-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Daftar Order Lunas</h3>
                <form method=POST action='<?= $admin_url; ?>main.php?pages=laporan&act=custom'>
                <div style="display: flex; justify-content: flex-end">
                <table>
                    <tr>
                      <td align="left">
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="tanggal" placeholder="DD-MM-YYYY"/>
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                      </td>
                      <td><div>s/d</div></td>
                      <td align="left">
                        <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate1" name="tanggal1" placeholder="DD-MM-YYYY"/>
                            <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                      </td>
                    </tr>
                  </table>
                </div>
                <div class="input-group-btn mt-2" style="display: flex; justify-content: flex-end">
                  <button type="submit" value=Proses class="btn btn-warning">Tampilkan </button> 
                </div>
                </form>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Nama Kustomer</th>
                      <th>Tgl Order</th>
                      <th>Jam</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                            $query = mysqli_query($koneksi, "SELECT id_orders,nama_lengkap,jam_order,DATE_FORMAT(tgl_order, '%d-%m-%Y') as tanggal FROM orders,kustomer WHERE orders.id_kustomer=kustomer.id_kustomer and orders.status_order='lunas' ORDER BY id_orders");
                            $i=1;
                            while($o=mysqli_fetch_array($query)){                              
                          ?>
                    <tr>
                      <td><?= $o['nama_lengkap'] ?></td>
                      <td><?= $o['tanggal'] ?></td>
                      <td><?= $o['jam_order'] ?></td>
                      <td>
                            <div class="input-group-btn">
                              <a href="<?= $admin_url; ?>main.php?pages=laporan&act=detailorder&id_order=<?= $o['id_orders']; ?>" class="btn btn-warning">Detail</i></a>
                              <a href="./pages/laporan/invoice.php?id_order=<?= $o['id_orders']; ?>"  target='_blank'>
                                <button class="btn btn-secondary">Cetak Invoice</button>
                              </a>
                              <a href="<?= $admin_url; ?>main.php?pages=aksi_order&status_order=Kirim&id_order=<?= $o['id_orders']; ?>">
                                <button class="btn btn-success">Kirim Orderan</button>
                              </a>
                            </div>
                          </td>
                    </tr>
                    <?php $i++;} ?> 
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <?php
  break;
  
    
  case "custom":
    $tgl = $_POST['tanggal'];
    $tgl1 = $_POST['tanggal1'];
    $tanggal = date('Y-m-d', strtotime($tgl));
    $tanggal1 = date('Y-m-d', strtotime($tgl1));
    $tangl = date('d-F-Y', strtotime($tgl));
    $tangl1 = date('d-F-Y', strtotime($tgl1));?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Laporan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= $admin_url ?>main.php?pages=home">Home</a></li>
                <li class="breadcrumb-item active">Laporan Order Lunas</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
  <div class="col-12">
              <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">Daftar Order Lunas</h3>
                  <form method=POST action='<?= $admin_url; ?>main.php?pages=laporan&act=custom'>
                  <div style="display: flex; justify-content: flex-end">
                  <table>
                      <tr>
                        <td align="left">
                          <div class="input-group date" id="reservationdate" data-target-input="nearest">
                              <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="tanggal" placeholder="DD-MM-YYYY"/>
                              <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                          </div>
                        </td>
                        <td><div>s/d</div></td>
                        <td align="left">
                          <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                              <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate1" name="tanggal1" placeholder="DD-MM-YYYY"/>
                              <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                          </div>
                        </td>
                      </tr>
                    </table>
                  </div>
                  <div>
                    <h3 class="card-title">Periode <?= $tangl ?> s/d <?= $tangl1 ?></h3>
                  </div>
                  <div class="input-group-btn mt-2" style="display: flex; justify-content: flex-end">
                    <button type="submit" value=Proses class="btn btn-warning">Tampilkan </button> 
                  </div>
                  </form>
                  <div>
                    <a href="pages/laporan/pdf_toko.php?tanggal=<?= $tanggal; ?>&tanggal1=<?= $tanggal1; ?>" target='_blank'>
                      <button class="btn btn-warning">PDF</button>
                    </a>
                    <a href="pages/laporan/excel.php?tanggal=<?= $tanggal; ?>&tanggal1=<?= $tanggal1; ?>" target='_blank'>
                      <button class="btn btn-warning">EXCEL</button>
                    </a>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Nama Kustomer</th>
                        <th>Tgl Order</th>
                        <th>Jam</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                              $query = mysqli_query($koneksi, "SELECT id_orders,nama_lengkap,jam_order,DATE_FORMAT(tgl_order, '%d-%m-%Y') as tanggal FROM orders,kustomer WHERE orders.id_kustomer=kustomer.id_kustomer and orders.status_order='lunas' and orders.tgl_order BETWEEN '$tanggal' AND '$tanggal1' ORDER BY id_orders");
                              $i=1;
                              while($o=mysqli_fetch_array($query)){                              
                            ?>
                      <tr>
                        <td><?= $o['nama_lengkap'] ?></td>
                        <td><?= $o['tanggal'] ?></td>
                        <td><?= $o['jam_order'] ?></td>
                        <td>
                              <div class="input-group-btn">
                                <a href="<?= $admin_url; ?>main.php?pages=laporan&act=detailorder&id_order=<?= $o['id_orders']; ?>" class="btn btn-warning">Detail</i></a>
                                <a href="./pages/laporan/invoice.php?id_order=<?= $o['id_orders']; ?>"  target='_blank'>
                                  <button class="btn btn-secondary">Cetak Invoice</button>
                                </a>
                              </div>
                            </td>
                      </tr>
                      <?php $i++;} ?> 
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
  <?php
  break;
  
    
  case "detailorder":?>
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
  <?php break; 
  }?>
