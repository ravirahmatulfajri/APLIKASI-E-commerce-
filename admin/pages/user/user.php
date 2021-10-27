



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
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar User</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
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
                          <a href="<?= $admin_url; ?>pages/user/aksi_hapus.php?username=<?= $u['username']; ?>" class="btn btn-danger"><i class="fas fa-power-off"></i></a>
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
              <a href="main.php?pages=tambah_user">
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
