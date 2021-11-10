  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Management Site</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= $admin_url ?>main.php?pages=home">Home</a></li>
              <li class="breadcrumb-item active">Site / Cara Beli</li>
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
                <h3 class="card-title">Cara Beli</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype='multipart/form-data' action="main.php?pages=aksi_cara_beli" class="form-horizontal">
                <?php
                  $query = mysqli_query($koneksi, "SELECT * FROM modul WHERE id_modul='45'");
                  $s=mysqli_fetch_array($query);
                ?>

                <input type=hidden name=id value="<?= $s['id_modul'] ?>">
                <div class="card-body">
                  <div class="form-group row">
                    <div class="col-sm">
                      <textarea id="summernote" rows="20" cols="20" type="text" class="form-control" name="static_content" placeholder="Isi Site"><?= $s['static_content'] ?></textarea>
                    </div>
                  </div>
                </div>

                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info float-right" name="upload" value="Upload">Edit</button>
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