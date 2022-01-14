



  <!-- Content Wrapper. Contains page content -->
  <?php
    $kueri = "SELECT count(distinct id_kustomer) as tt FROM orders";
    $proses = mysqli_query($koneksi, $kueri);
    while ($data = mysqli_fetch_array($proses))
    {						
    $tot_user_order=$data['tt'];
    }

    $kueri = "SELECT sum(b.jumlah) as tt FROM orders a, orders_detail b WHERE a.id_orders = b.id_orders";
    $proses = mysqli_query($koneksi, $kueri);
    while ($data = mysqli_fetch_array($proses))
    {						
    $tot_barang_order=$data['tt'];
    }

    $tot_order_masuk=0;
		$kueri = "select id_orders from orders";
		$proses = mysqli_query($koneksi, $kueri);
		while ($data = mysqli_fetch_array($proses))
		{						
    $tot_order_masuk++;
		}

    $tot_order_baru=0;
		$kueri = "select id_orders from orders where status_order = 'baru'";
		$proses = mysqli_query($koneksi, $kueri);
		while ($data = mysqli_fetch_array($proses))
		{						
    $tot_order_baru++;
		}
											
		$tot_order_lunas=0;
		$kueri = "select id_orders from orders where status_order = 'lunas' or status_order = 'kirim'";
		$proses = mysqli_query($koneksi, $kueri);
		while ($data = mysqli_fetch_array($proses))
		{						
    $tot_order_lunas++;
		}

    $tot_order_batal=0;
		$kueri = "select id_orders from orders where status_order = 'batal'";
		$proses = mysqli_query($koneksi, $kueri);
		while ($data = mysqli_fetch_array($proses))
		{						
    $tot_order_batal++;
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
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo"$tot_user_order" ?></sup></h3>

                <p>User Order</p>
              </div>
              <a href="main.php?pages=customer&act=" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3><?php echo"$tot_barang_order" ?></sup></h3>

                <p>Orderan Barang</p>
              </div>
              <a href="pages/home/pdf_barang.php" target='_blank' class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3><?php echo"$tot_order_masuk" ?></sup></h3>

                <p>Orderan Masuk</p>
              </div>
              <a href="main.php?pages=masuk&act=" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo"$tot_order_baru" ?></sup></h3>

                <p>Orderan Baru</p>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo"$tot_order_lunas" ?></h3>

                <p>Orderan Lunas</p>
              </div>
              <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="small-box-footer dropdown-item dropdown-toggle">More info</a>
              <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                <li>
                  <a tabindex="-1" href="main.php?pages=laporan&act=" class="dropdown-item">Proses</a>
                </li>
                <li>
                  <a tabindex="-1" href="main.php?pages=kirim&act=" class="dropdown-item">Kirim</a>
                </li>
              </ul>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo"$tot_order_batal" ?></h3>

                <p>Orderan Batal</p>
              </div>
              <a href="main.php?pages=batal&act=" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <div class="col-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Daftar Barang Order Baru</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table id="example2" class="table table-bordered table-striped">
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
                              <a href="./pages/home/invoice.php?id_order=<?= $o['id_orders']; ?>"  target='_blank'>
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
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  