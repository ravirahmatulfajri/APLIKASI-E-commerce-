



  <!-- Content Wrapper. Contains page content -->
  <?php
    $tot_order_baru=0;
		$kueri = "select id_orders from orders where status_order = 'baru'";
		$proses = mysqli_query($koneksi, $kueri);
		while ($data = mysqli_fetch_array($proses))
		{						
    $tot_order_baru++;
		}
											
		$tot_order_lunas=0;
		$kueri = "select id_orders from orders where status_order = 'lunas'";
		$proses = mysqli_query($koneksi, $kueri);
		while ($data = mysqli_fetch_array($proses))
		{						
    $tot_order_lunas++;
		}
	?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo"$tot_order_baru" ?></sup></h3>

                <p>Orderan Baru</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo"$tot_order_lunas" ?></h3>

                <p>Orderan Lunas</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-stalker"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Laporan</h3>
                <form method=POST action='pages/laporan/pdf_toko.php'>
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
            </div>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar Barang Order Baru</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Nama Kustomer</th>
                      <th>Tgl Order</th>
                      <th>Jam</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                            $query = mysqli_query($koneksi, "SELECT * FROM orders,kustomer WHERE orders.id_kustomer=kustomer.id_kustomer and orders.status_order='baru' ORDER BY id_orders");
                            $i=1;
                            while($o=mysqli_fetch_array($query)){                              
                          ?>
                    <tr>
                      <td><?= $o['nama_lengkap'] ?></td>
                      <td><?= $o['tgl_order'] ?></td>
                      <td><?= $o['jam_order'] ?></td>
                      <td><?= $o['status_order'] ?></td>
                      <td>
                            <div class="input-group-btn">
                              <a href="<?= $admin_url; ?>main.php?pages=order&act=detailorder&id_order=<?= $o['id_orders']; ?>" class="btn btn-warning">Detail</i></a>
                            </div>
                          </td>
                    </tr>
                    <?php $i++;} ?> 
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  