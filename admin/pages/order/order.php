



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Order</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= $admin_url ?>main.php?pages=home">Home</a></li>
              <li class="breadcrumb-item active">Order</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar Barang Order</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Nama Kustomer</th>
                      <th>Tgl Order</th>
                      <th>Jam</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                            include "../lib/config.php";
                            include "../lib/koneksi.php";
                            $query = mysqli_query($koneksi, "SELECT * FROM orders,kustomer WHERE orders.id_kustomer=kustomer.id_kustomer ORDER BY id_orders");
                            $i=1;
                            while($o=mysqli_fetch_array($query)){                              
                          ?>
                    <tr>
                      <td><?= $o['nama_lengkap'] ?></td>
                      <td><?= $o['tgl_order'] ?></td>
                      <td><?= $o['jam_order'] ?></td>
                      <td><?= $o['status_order'] ?></td>
                      <td>
                            <div class="input-group-btn">
                              <a href="<?= $admin_url; ?>main.php?pages=edit_order&id_order=<?= $o['id_orders']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
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
