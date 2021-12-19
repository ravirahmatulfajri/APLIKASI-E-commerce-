<?php
switch($_GET['act']){
  // Tampil Kategori
  default:?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= $admin_url ?>main.php?pages=home">Home</a></li>
              <li class="breadcrumb-item active">User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<div class="col-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Daftar User</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th style="width: 20px">#</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th>Realname</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Role</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      include "../lib/config.php";
                      include "../lib/koneksi.php";
                      $query = mysqli_query($koneksi, "SELECT * FROM admins ");
                      $i=1;
                      while($u=mysqli_fetch_array($query)){                              
                    ?>
                    <tr>
                      <td><?= $i ?>.</td>
                      <td><?= $u['username'] ?></td>
                      <td><?= $u['password'] ?></td>
                      <td><?= $u['nama_lengkap'] ?></td>
                      <td><?= $u['email'] ?></td>
                      <td><?= $u['no_telp'] ?></td>
                      <td><?= $u['level'] ?></td>
                      <td>
                        <div class="input-group-btn">
                          <a href="<?= $admin_url; ?>main.php?pages=aksi_user&act=hapus&username=<?= $u['username']; ?>" class="btn btn-danger"><i class="fas fa-power-off"></i></a>
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
            <div class="input-group-btn float-right">
              <a href="main.php?pages=user&act=tambahkategori">
                <button href="index.php" type="button" class="btn btn-primary">Tambah Daftar</button>
              </a>
            </div>                      
            </ul>
    <!-- /.card -->
            </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <?php
  break;
  
  // Form Tambah Kategori
  case "tambahkategori":?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= $admin_url ?>main.php?pages=home">Home</a></li>
              <li class="breadcrumb-item active">User</li>
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
                <h3 class="card-title">Form Tambah User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php
              $pilihan_status = array('N', 'Y');
              $pilihan = '';
              foreach ($pilihan_status as $status) {
                $pilihan .= "<option value=$status";
                $pilihan .= ">$status</option>\r\n";
                }
              $pilihan_role = array('admin', 'operator', 'manajer');
              $role = '';
              foreach ($pilihan_role as $a) {
                $role .= "<option value=$a";
                $role .= ">$a</option>\r\n";
                }
              ?>
              <form method="post" action="main.php?pages=aksi_user&act=input" class="form-horizontal">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="username" placeholder="Username">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="password" placeholder="Password">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="email" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">No Telp</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="no_telp" placeholder="No Telepon">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Role</label>
                    <div class="col-sm-10">
                    <select name=level class="form-control"><?php echo $role; ?></select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Blokir</label>
                    <div class="col-sm-10">
                      <select name=blokir class="form-control"><?php echo $pilihan; ?></select>
                    </div>
                  </div>
                </div>

                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info float-right">Tambah</button>
                  
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->
                    </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <?php
  break;  
}
?>