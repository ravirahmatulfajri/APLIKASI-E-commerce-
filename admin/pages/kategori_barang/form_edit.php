  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Kamar</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= $admin_url ?>main.php?pages=home">Home</a></li>
              <li class="breadcrumb-item active">Kamar</li>
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
                <h3 class="card-title">Form Edit Kamar</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="pages/kategori_barang/aksi_edit.php" class="form-horizontal">
                <?php
                  include "../lib/config.php";
                  include "../lib/koneksi.php";
                  $id_kategori = $_GET['id_kategori'];
                  $query = mysqli_query($koneksi, "SELECT * FROM kategori WHERE id_kategori='$id_kategori'");
                  $k=mysqli_fetch_array($query);
                ?>
                <input type="hidden" name="id_kategori" value="<?php echo $id_kategori; ?>">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama kategori</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nama_kategori" value="<?= $k['nama_kategori'] ?>" placeholder="Nama kategori">
                    </div>
                  </div>
                  </div>
                </div>

                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info float-right">Edit</button>
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