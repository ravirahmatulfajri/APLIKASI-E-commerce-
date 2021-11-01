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
              <li class="breadcrumb-item active">Site / Profil Toko</li>
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
                <h3 class="card-title">Profil Toko</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype='multipart/form-data' action="main.php?pages=aksi_profil" class="form-horizontal">
                <?php
                  $query = mysqli_query($koneksi, "SELECT * FROM modul WHERE id_modul='43'");
                  $s=mysqli_fetch_array($query);
                ?>

                <input type=hidden name=id value="<?= $s['id_modul'] ?>">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Toko</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nama_toko" value="<?= $s['nama_toko'] ?>" placeholder="Nama Toko">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Meta Deskripsi</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="meta_deskripsi" value="<?= $s['meta_deskripsi'] ?>" placeholder="Meta Deskripsi">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Meta Keyword</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="meta_keyword" value="<?= $s['meta_keyword'] ?>" placeholder="Meta Keyword">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email Pengelola</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="email_pengelola" value="<?= $s['email_pengelola'] ?>" placeholder="Email Pengelola">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">No.HP Pengelola</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nomor_hp" value="<?= $s['nomor_hp'] ?>" placeholder="No.HP Pengelola">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nomor Rekening</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nomor_rekening" value="<?= $s['nomor_rekening'] ?>" placeholder="Nomor Rekening">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Gambar</label>
                    <div class="col-sm-10">
                      <img src=../foto_banner/<?= $s['gambar'] ?>>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Ganti Foto</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-control" name="fupload">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Isi Profil Toko</label>
                    <div class="col-sm-10">
                      <textarea id="summernote" rows="20" cols="20" type="text" class="form-control" name="static_content" value="<?= $s['static_content'] ?>" placeholder="Isi Site"><?= $s['static_content'] ?></textarea>
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