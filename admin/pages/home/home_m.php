



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
		$kueri = "select id_orders from orders where status_order = 'lunas' or status_order = 'kirim'";
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
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Bar chart -->
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="far fa-chart-bar"></i>
                  Grafik Jumlah Orderan Masuk <?php if (!empty($_GET['tahun'])) {
                    $tahun = $_GET['tahun'];
                    echo "(tahun $tahun)";
                 } ?>      
                </h3>

                <div class="card-tools" style="width: 300px;">
                  <form action="main.php?" method="get">
                    <input type="hidden" name="pages" value="home">
                  <select class="custom-select" name="tahun" style="width: 50%">
                    <option value="">-- Pilih Tahun --</option>
                    <?php
                      include "../lib/config.php";
                      include "../lib/koneksi.php";
                      $q = mysqli_query($koneksi, "SELECT distinct YEAR(tgl_order) FROM orders ORDER BY YEAR(tgl_order)");
                      while($o=mysqli_fetch_array($q)){
                    ?>                          
                      <option value="<?php echo $o['YEAR(tgl_order)']; ?>">
                        <?php echo $o['YEAR(tgl_order)']; ?>
                      </option>
                      <?php } ?>
                  </select>
                    <button type="submit" class="btn btn-primary">Tampilkan</button>
                  </form>
                </div>
              </div>
              <div class="card-body">
                <div id="bar-chart" style="height: 300px;"></div>
              </div>
              <!-- /.card-body-->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  