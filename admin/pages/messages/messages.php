



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Messages</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= $admin_url ?>main.php?pages=home">Home</a></li>
              <li class="breadcrumb-item active">Messages</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar Messages</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width: 20px">#</th>
                      <th>Tangggal</th>
                      <th>Nama Pengirim</th>
                      <th>Alamat</th>
                      <th>Telepon</th>
                      <th>Email</th>
                      <th>Isi Pesan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      include "../lib/config.php";
                      include "../lib/koneksi.php";
                      $query = mysqli_query($koneksi, "SELECT * FROM tb_contact_us ");
                      $i=1;
                      while($m=mysqli_fetch_array($query)){                              
                    ?>
                    <tr>
                      <td><?= $i ?>.</td>
                      <td><?= $m['tgl_pesan'] ?></td>
                      <td><?= $m['nama'] ?></td>
                      <td><?= $m['alamat'] ?></td>
                      <td><?= $m['phone'] ?></td>
                      <td><?= $m['email'] ?></td>
                      <td><?= $m['pesan'] ?></td>
                      <td>
                        <div class="input-group-btn">
                          <a href="<?= $admin_url; ?>pages/messages/aksi_hapus.php?id_con=<?= $m['id_con']; ?>" class="btn btn-danger"><i class="fas fa-power-off"></i></a>
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
