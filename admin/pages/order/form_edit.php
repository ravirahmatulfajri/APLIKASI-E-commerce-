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
                <h3 class="card-title">Form Tambah Barang</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="pages/order/aksi_edit.php" class="form-horizontal">
                <?php
                  include "../lib/config.php";
                  include "../lib/koneksi.php";
                  $id_order = $_GET['id_order'];
                  $query = mysqli_query($koneksi, "SELECT * FROM orders,kustomer WHERE orders.id_kustomer=kustomer.id_kustomer AND id_orders='$id_order'");
                  $o=mysqli_fetch_array($query);

                  if ($o['status_order']=='Baru'){
                    $pilihan_status = array('Baru', 'Lunas');
                  }
                  elseif ($o['status_order']=='Lunas'){
                      $pilihan_status = array('Lunas', 'Batal');    
                  }
                  else{
                      $pilihan_status = array('Baru', 'Lunas', 'Batal');    
                  }
              
                  $pilihan_order = '';
                  foreach ($pilihan_status as $status) {
                  $pilihan_order .= "<option value=$status";
                  if ($status == $o['status_order']) {
                      $pilihan_order .= " selected";
                  }
                  $pilihan_order .= ">$status</option>\r\n";
                  }
                ?>
                <input type="hidden" name="id_order" value="<?php echo $id_order; ?>">
                <div class="card-body">
                <table border="1" cellpadding="10" cellspacing="0">
                    <tr>
                      <td><b>No Order</b></td>
                      <td><?= $o['id_orders'] ?></td>
                    </tr>
                    <tr>
                      <td><b>Tanggal Order</b></td>
                      <td><?= $o['tgl_order'] ?>&<?= $o['jam_order'] ?></td>
                    </tr>
                    <tr>
                      <td><b>Status Order</b></td>
                      <td><select name=status_order><?php echo $pilihan_order; ?></select>
                      <input type=submit value='Ubah Status'></td>
                    </tr>
                </table>
              </form>
              <table border="1" cellpadding="10" cellspacing="0">
                    <tr>
                      <th><b>Nama Produk</b></th>
                      <th><b>Berat(kg)</b></th>
                      <th><b>Jumlah</b></th>
                      <th><b>Harga Satuan</b></th>
                      <th><b>Sub Total</b></th>
                    </tr>
                <?php
                $query2 = mysqli_query($koneksi, "SELECT * FROM orders_detail a, produk b WHERE a.id_produk=b.id_produk AND a.id_orders=$id_order");
                while($o2=mysqli_fetch_array($query2)){
                  $disc        = ($o2['diskon']/100)*$o2['harga'];
                  $hargadisc   = number_format(($o2['harga']-$disc),0,",","."); 
                  $subtotal    = ($o2['harga']-$disc) * $o2['jumlah'];

                    $total       = $total + $subtotal;
                    $subtotal_rp = format_rupiah($subtotal);    
                    $total_rp    = format_rupiah($total);    
                    $harga       = format_rupiah($o2['harga']);

                  $subtotalberat = $o2['berat'] * $o2['jumlah']; // total berat per item produk 
                  $totalberat  = $totalberat + $subtotalberat; // grand total berat all produk yang dibeli?>

                    <tr>
                      <td><?= $o2['nama_produk'] ?></td>
                      <td align=center><?= $o2['berat'] ?></td>
                      <td align=center><?= $o2['jumlah'] ?></td>
                      <td align=center><?php echo $harga; ?></td>
                      <td align=center><?php echo $subtotal_rp; ?></td>
                    </tr>
                <?php;}?>
              </table>
            </div>
            <!-- /.card -->
          </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>