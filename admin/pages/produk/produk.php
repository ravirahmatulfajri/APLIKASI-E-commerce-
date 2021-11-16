<?php
switch($_GET['act']){
  // Tampil Produk
  default:?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Produk</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= $admin_url ?>main.php?pages=home">Home</a></li>
              <li class="breadcrumb-item active">Nama Produk</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<div class="col-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Daftar Nama Produk</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th style="width: 20px">#</th>
                      <th>Nama Produk</th>
                      <th>Gambar Produk</th>
                      <th>Berat</th>
                      <th>Harga</th>
                      <th>Diskon</th>
                      <th>Stok</th>
                      <th>Tgl Masuk</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                            include "../lib/config.php";
                            include "../lib/koneksi.php";
                            $query = mysqli_query($koneksi, "SELECT * FROM produk ORDER BY id_produk");
                            $i=1;
                            while($k=mysqli_fetch_array($query)){                              
                          ?>
                    <tr>
                      <td><?= $i ?>.</td>
                      <td><?= $k['nama_produk'] ?></td>
                      <td><img src=../foto_produk/<?= $k['gambar'] ?>></td>
                      <td><?= $k['berat'] ?>Kg</td>
                      <td>Rp. <?= number_format($k['harga'],0,',','.'); ?></td>
                      <td><?= $k['diskon'] ?>%</td>
                      <td><?= $k['stok'] ?>Pcs</td>
                      <td><?= $k['tgl_masuk'] ?></td>
                      <td>
                            <div class="input-group-btn pb-1">
                              <a href="<?= $admin_url; ?>main.php?pages=produk&act=editproduk&id_produk=<?= $k['id_produk']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                              <a href="<?= $admin_url; ?>main.php?pages=aksi_produk&act=hapus&id_produk=<?= $k['id_produk']; ?>" class="btn btn-danger"><i class="fas fa-power-off"></i></a>
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
                      <a href="main.php?pages=produk&act=tambahproduk">
                        <button type="button" class="btn btn-primary">Tambah Daftar</button>
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

  case "tambahproduk":?>
        <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Produk</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= $admin_url ?>main.php?pages=home">Home</a></li>
              <li class="breadcrumb-item active">Nama Produk</li>
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
                <h3 class="card-title">Form Tambah Produk</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="main.php?pages=aksi_produk&act=input" class="form-horizontal" enctype='multipart/form-data'>
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
                    <select name="kategori" class="form-control select2" style="width: 100%;">
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
                      <input type="text" class="form-control" name="diskon" placeholder="Diskon">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Stok</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="stok" placeholder="Stock">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                      <textarea id="summernote" rows="20" cols="20" type="text" class="form-control" name="deskripsi" placeholder="Deskripsi Produk"></textarea>
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
<?php
break;
    
case "editproduk":?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Produk</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= $admin_url ?>main.php?pages=home">Home</a></li>
              <li class="breadcrumb-item active">Produk</li>
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
                <h3 class="card-title">Form Edit Produk</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype='multipart/form-data' action="main.php?pages=aksi_produk&act=update" class="form-horizontal">
                <?php
                  $id_produk = $_GET['id_produk'];
                  $query = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='$id_produk'");
                  $k=mysqli_fetch_array($query);
                ?>
                <input type="hidden" name="id_produk" value="<?php echo $id_produk; ?>">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Produk</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nama_produk" value="<?= $k['nama_produk'] ?>" placeholder="Nama Produk">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Kategori</label>
                    <div class="col-sm-10">
                    <select name="kategori" class="form-control select2" style="width: 100%;">
                      <option selected="selected">-- Pilih Kategori --</option>
                      <?php
                        $q = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY nama_kategori DESC");
                        while($tipe=mysqli_fetch_array($q)){
                          if ($k['id_kategori']==$tipe['id_kategori']){
                            echo "<option value=$tipe[id_kategori] selected>$tipe[nama_kategori]</option>";
                          }
                          else{
                            echo "<option value=$tipe[id_kategori]>$tipe[nama_kategori]</option>";
                          }
                        }?>
                    </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Berat</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="berat" value="<?= $k['berat'] ?>" placeholder="Berat dalam KG">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="harga" value="<?= $k['harga'] ?>" placeholder="Harga">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Diskon</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="diskon" value="<?= $k['diskon'] ?>" placeholder="Diskon">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Stok</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="stok" value="<?= $k['stok'] ?>" placeholder="Stok">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                      <textarea id="summernote" rows="20" cols="20" type="text" class="form-control" name="deskripsi" value="<?= $k['deskripsi'] ?>" placeholder="Deskripsi Produk"><?= $k['deskripsi'] ?></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Gambar</label>
                    <div class="col-sm-10">
                      <img src=../foto_produk/<?= $k['gambar'] ?>>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Ganti Foto</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-control" name="fupload">
                    </div>
                  </div>
                </div>

                <!-- /.card-body -->
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
  <?php
  break;  
}
?>
