



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Testimoni</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= $admin_url ?>main.php?pages=home">Home</a></li>
              <li class="breadcrumb-item active">Testimoni</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<div class="col-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Daftar Testimoni</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th style="width: 20px">#</th>
                      <th>Tangggal</th>
                      <th>Nama Pengirim</th>
                      <th>Isi Pesan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $query = mysqli_query($koneksi, "SELECT * FROM testimoni ");
                      $i=1;
                      while($m=mysqli_fetch_array($query)){                              
                    ?>
                    <tr>
                      <td><?= $i ?>.</td>
                      <td><?= $m['tanggal'] ?></td>
                      <td><?= $m['nama'] ?></td>
                      <td><?= $m['isi'] ?></td>
                      <td>
                        <div class="input-group-btn">
                          <a href="<?= $admin_url ?>main.php?pages=aksi_testi?id_testi=<?= $m['id_testi']; ?>" class="btn btn-danger">HAPUS</a>
                        </div>
                      </td>
                    </tr>
                    <?php $i++;} ?> 
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <ul class="nav navbar-right panel_toolbox">                   
            </ul>
    <!-- /.card -->
            </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
