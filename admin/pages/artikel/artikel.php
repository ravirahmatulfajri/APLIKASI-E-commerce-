<?php
switch($_GET['act']){
  // Tampil Artikel
  default:?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Artikel</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= $admin_url ?>main.php?pages=home">Home</a></li>
              <li class="breadcrumb-item active">Nama Artikel</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<div class="col-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Daftar Nama Artikel</h3><br><br>
                <div>
                  <a href="main.php?pages=artikel&act=tambahartikel">
                    <button class="btn btn-success">Tambah Daftar</button>
                  </a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th style="width: 20px">#</th>
                      <th>Judul Artikel</th>
                      <th>Isi Artikel</th>
                      <th>Gambar</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                            $query = mysqli_query($koneksi, "SELECT * FROM artikel ORDER BY id_artikel");
                            $i=1;
                            while($k=mysqli_fetch_array($query)){                              
                          ?>
                    <tr>
                      <td><?= $i ?>.</td>
                      <td><?= $k['judul'] ?></td>
                      <td><?= $k['isi_artikel'] ?></td>
                      <td><img src=../foto_artikel/small_<?= $k['gambar'] ?>></td>
                      <td>
                            <div class="input-group-btn pb-1">
                              <a href="<?= $admin_url; ?>main.php?pages=artikel&act=editartikel&id_artikel=<?= $k['id_artikel']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                              <a href="<?= $admin_url; ?>main.php?pages=aksi_artikel&act=hapus&id_artikel=<?= $k['id_artikel']; ?>" class="btn btn-danger"><i class="fas fa-power-off"></i></a>
                            </div>
                          </td>
                    </tr>
                    <?php $i++;} ?> 
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
                    </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <?php
  break;

  case "tambahartikel":?>
        <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Artikel</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= $admin_url ?>main.php?pages=home">Home</a></li>
              <li class="breadcrumb-item active">Nama Artikel</li>
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
                <h3 class="card-title">Form Tambah Artikel</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="main.php?pages=aksi_artikel&act=input" class="form-horizontal" enctype='multipart/form-data'>
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Judul Artikel</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nama_artikel" placeholder="Nama artikel">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Isi Artikel</label>
                    <div class="col-sm-10">
                      <textarea id="summernote" rows="20" cols="20" type="text" class="form-control" name="deskripsi" placeholder="Deskripsi artikel"></textarea>
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
    
case "editartikel":?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Artikel</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= $admin_url ?>main.php?pages=home">Home</a></li>
              <li class="breadcrumb-item active">Artikel</li>
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
                <h3 class="card-title">Form Edit Artikel</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype='multipart/form-data' action="main.php?pages=aksi_artikel&act=update" class="form-horizontal">
                <?php
                  $id_artikel = $_GET['id_artikel'];
                  $query = mysqli_query($koneksi, "SELECT * FROM artikel WHERE id_artikel='$id_artikel'");
                  $k=mysqli_fetch_array($query);
                ?>
                <input type="hidden" name="id_artikel" value="<?php echo $id_artikel; ?>">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Judul artikel</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nama_artikel" value="<?= $k['judul'] ?>" placeholder="Nama artikel">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Isi Artikel</label>
                    <div class="col-sm-10">
                      <textarea id="summernote" rows="20" cols="20" type="text" class="form-control" name="deskripsi" value="<?= $k['isi_artikel'] ?>"><?= $k['isi_artikel'] ?></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Gambar</label>
                    <div class="col-sm-10">
                      <img src=../foto_artikel/<?= $k['gambar'] ?>>
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
