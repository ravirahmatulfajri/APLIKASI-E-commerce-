  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Barang</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= $admin_url ?>main.php?pages=home">Home</a></li>
              <li class="breadcrumb-item active">Kategori Barang</li>
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
                <h3 class="card-title">Form Tambah Kategori Barang</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="pages/kategori_barang/aksi_tambah.php" class="form-horizontal">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Kategori Barang</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nama_kategori" placeholder="Nama Kategori Barang">
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