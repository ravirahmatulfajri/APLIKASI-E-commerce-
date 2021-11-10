<?php
    echo "<!-- Content Wrapper. Contains page content -->
    <div class='content-wrapper'>
      <!-- Content Header (Page header) -->
      <div class='content-header'>
        <div class='container-fluid'>
          <div class='row mb-2'>
            <div class='col-sm-6'>
              <h1 class='m-0'>Password</h1>
            </div><!-- /.col -->
            <div class='col-sm-6'>
              <ol class='breadcrumb float-sm-right'>
                <li class='breadcrumb-item'><a href='<?= $admin_url ?>main.php?pages=home'>Home</a></li>
                <li class='breadcrumb-item active'>Ganti Password</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <div class='col-12'>
  <!-- Horizontal Form -->
              <div class='card card-info'>
                <div class='card-header'>
                  <h3 class='card-title'>Form Ganti Password</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method='post' action='main.php?pages=aksi_pass' class='form-horizontal' enctype='multipart/form-data'>
                  <div class='card-body'>
                    <div class='form-group row'>
                      <label class='col-sm-2 col-form-label'>Masukkan Password Lama</label>
                      <div class='col-sm-10'>
                        <input type='text' class='form-control' name='pass_lama' placeholder='Masukkan Password Lama'>
                      </div>
                    </div>
                    <div class='form-group row'>
                      <label class='col-sm-2 col-form-label'>Masukkan Password Baru</label>
                      <div class='col-sm-10'>
                        <input type='text' class='form-control' name='pass_baru' placeholder='Masukkan Password Baru'>
                      </div>
                    </div>
                    <div class='form-group row'>
                      <label class='col-sm-2 col-form-label'>Masukkan Lagi Password Baru</label>
                      <div class='col-sm-10'>
                        <input type='text' class='form-control' name='pass_ulangi' placeholder='Masukkan Lagi Password Baru'>
                      </div>
                    </div>
                    <!-- /.card-body -->
                  <button type='submit' class='btn btn-info float-right'>Ubah</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->
                    </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>";
?>
