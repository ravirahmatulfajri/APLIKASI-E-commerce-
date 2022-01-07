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
              <li class="breadcrumb-item active">Laporan Nama Customer</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<div class="col-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Daftar Customer</h3><br>
                <div>
                  <a href="pages/customer/pdf.php" target='_blank'>
                    <button class="btn btn-warning">PDF</button>
                  </a>
                  <a href="pages/customer/excel.php" target='_blank'>
                    <button class="btn btn-warning">EXCEL</button>
                  </a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Lengkap</th>
                      <th>Alamat</th>
                      <th>Email</th>
                      <th>Telpon</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                            $query = mysqli_query($koneksi, "SELECT * FROM kustomer");
                            $i=1;
                            while($o=mysqli_fetch_array($query)){                              
                          ?>
                    <tr>
                      <td><?= $i ?></td>
                      <td><?= $o['nama_lengkap'] ?></td>
                      <td><?= $o['alamat'] ?></td>
                      <td><?= $o['email'] ?></td>
                      <td><?= $o['telpon'] ?></td>
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
  
  }?>
