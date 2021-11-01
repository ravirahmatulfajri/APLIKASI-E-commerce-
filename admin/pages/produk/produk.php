



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
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar Nama Barang</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width: 20px">#</th>
                      <th>Nama Produk</th>
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
                      <td><?= $k['berat'] ?>Kg</td>
                      <td>Rp. <?= number_format($k['harga'],0,',','.'); ?></td>
                      <td><?= $k['diskon'] ?>%</td>
                      <td><?= $k['stok'] ?>Pcs</td>
                      <td><?= $k['tgl_masuk'] ?></td>
                      <td>
                            <div class="input-group-btn pb-1">
                              <a href="<?= $admin_url; ?>main.php?pages=edit_nama_barang&id_produk=<?= $k['id_produk']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                              <a href="<?= $admin_url; ?>pages/nama_barang/aksi_hapus.php?id_produk=<?= $k['id_produk']; ?>" class="btn btn-danger"><i class="fas fa-power-off"></i></a>
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
                      <a href="main.php?pages=tambah_nama_barang">
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
