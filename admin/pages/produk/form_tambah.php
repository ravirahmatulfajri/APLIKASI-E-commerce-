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
              <li class="breadcrumb-item active">Nama Barang</li>
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
                <h3 class="card-title">Form Tambah Barang</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="pages/nama_barang/aksi_tambah.php" class="form-horizontal" enctype='multipart/form-data'>
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Produk</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nama_produk" placeholder="Nama Produk">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Kategori</label>
                    <div class="col-sm-10">
                    <select name="tipe_kamar" class="form-control select2" style="width: 100%;">
                      <option selected="selected">-- Pilih Kategori --</option>
                      <?php
                        $q = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY nama_kategori DESC");
                        while($tipe=mysqli_fetch_array($q)){
                      ?>                          
                      <option value="<?php echo $tipe['id_kategori']; ?>">
                        <?php echo $tipe['nama_kategori']; ?>
                      </option>
                      <?php } ?>
                    </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Berat</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="berat" placeholder="Berat dalam KG">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="harga" placeholder="Harga">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Diskon</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="diskon" placeholder="Harga">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Stok</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="stok" placeholder="Harga">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                      <textarea id="summernote" rows="20" cols="20" type="text" class="form-control" name="deskripsi" placeholder="Deskripsi Barang"></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Gambar</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-control" name="fupload" size=40>
                    </div>
                  </div>
                </div>

                <!-- /.card-body -->
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