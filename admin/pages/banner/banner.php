<?php
switch($_GET['act']){
  // Tampil Banner
  default:
    echo "<!-- Content Wrapper. Contains page content -->
    <div class='content-wrapper'>
        <!-- Content Header (Page header) -->
        <div class='content-header'>
          <div class='container-fluid'>
            <div class='row mb-2'>
              <div class='col-sm-6'>
                <h1 class='m-0'>Banner</h1>
              </div><!-- /.col -->
              <div class='col-sm-6'>
                <ol class='breadcrumb float-sm-right'>
                  <li class='breadcrumb-item'><a href='<?= $admin_url ?>main.php?pages=home'>Banner</a></li>
                  <li class='breadcrumb-item active'>Banner</li>
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
                    <h3 class='card-title'>Daftar Banner</h3><br><br>
                    <div>
                      <a href='main.php?pages=banner&act=tambahbanner'>
                        <button class='btn btn-success'>Tambah Daftar</button>
                      </a>
                    </div>
                  </div>
                  <div class='card-body'>
          <table class='table' border='1' cellpadding='10' cellspacing='0'> <thead class='thead-dark'>
          <tr><th>no</th><th>judul</th><th>Gambar</th><th>url</th><th>tgl. posting</th><th>aksi</th></tr></thead>";
    $tampil=mysqli_query($koneksi,"SELECT * FROM banner ORDER BY id_banner DESC");
    $no=1;
    while ($r=mysqli_fetch_array($tampil)){
      $tgl=tgl_indo($r['tgl_posting']);
      echo "<tr><td>$no</td>
                <td>$r[judul]</td>
                <td><img src=../foto_banner/$r[gambar]></td>
                <td><a href=$r[url] target=_blank>$r[url]</a></td>
                <td>$tgl</td>
                <td><a href=main.php?pages=banner&act=editbanner&id=$r[id_banner]>Edit</a> | 
	                  <a href='main.php?pages=aksi_banner&act=hapus&id=$r[id_banner]&namafile=$r[gambar]'>Hapus</a>
		        </tr>";
    $no++;
    }
    echo "</table>";
    echo "</div>
    </div><!-- /.container-fluid -->
<!-- /.content -->
</div>";
    break;
  
  case "tambahbanner":

    echo "<!-- Content Wrapper. Contains page content -->
  <div class='content-wrapper'>
    <!-- Content Header (Page header) -->
    <div class='content-header'>
      <div class='container-fluid'>
        <div class='row mb-2'>
          <div class='col-sm-6'>
            <h1 class='m-0'>Banner</h1>
          </div><!-- /.col -->
          <div class='col-sm-6'>
            <ol class='breadcrumb float-sm-right'>
              <li class='breadcrumb-item'><a href='<?= $admin_url ?>main.php?pages=home'>Home</a></li>
              <li class='breadcrumb-item active'>Nama Banner</li>
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
                <h3 class='card-title'>Form Tambah Banner</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method=POST action='main.php?pages=aksi_banner&act=input' class='form-horizontal' enctype='multipart/form-data'>
                <div class='card-body'>
                  <div class='form-group row'>
                    <label class='col-sm-2 col-form-label'>Judul</label>
                    <div class='col-sm-10'>
                      <input type='text' class='form-control' name='judul' placeholder='judul'>
                    </div>
                  </div>
                  <div class='form-group row'>
                    <label class='col-sm-2 col-form-label'>Url</label>
                    <div class='col-sm-10'>
                      <input type='text' class='form-control' name='url' value='http://'>
                    </div>
                  </div>
                  <div class='form-group row'>
                    <label class='col-sm-2 col-form-label'>Gambar</label>
                    <div class='col-sm-10'>
                      <input type='file' class='form-control' name='fupload' size=40>
                    </div>
                  </div>
                </div>

                <!-- /.card-body -->
                  <button type='submit' class='btn btn-info float-right'>Tambah</button>
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
     break;
    
  case "editbanner":
    $edit = mysqli_query($koneksi,"SELECT * FROM banner WHERE id_banner='$_GET[id]'");
    $r    = mysqli_fetch_array($edit);

    echo "<!-- Content Wrapper. Contains page content -->
  <div class='content-wrapper'>
    <!-- Content Header (Page header) -->
    <div class='content-header'>
      <div class='container-fluid'>
        <div class='row mb-2'>
          <div class='col-sm-6'>
            <h1 class='m-0'>Banner</h1>
          </div><!-- /.col -->
          <div class='col-sm-6'>
            <ol class='breadcrumb float-sm-right'>
              <li class='breadcrumb-item'><a href='<?= $admin_url ?>main.php?pages=home'>Home</a></li>
              <li class='breadcrumb-item active'>Nama Banner</li>
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
                <h3 class='card-title'>Form Ganti Banner</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method=POST action='main.php?pages=aksi_banner&act=update' class='form-horizontal' enctype='multipart/form-data'>
              <input type=hidden name=id value=$r[id_banner]>
                <div class='card-body'>
                  <div class='form-group row'>
                    <label class='col-sm-2 col-form-label'>Judul</label>
                    <div class='col-sm-10'>
                      <input type='text' class='form-control' name='judul' placeholder='judul' value='$r[judul]'>
                    </div>
                  </div>
                  <div class='form-group row'>
                    <label class='col-sm-2 col-form-label'>Url</label>
                    <div class='col-sm-10'>
                      <input type='text' class='form-control' name='url' value='$r[url]'>
                    </div>
                  </div>
                  <div class='form-group row'>
                    <label class='col-sm-2 col-form-label'>Gambar</label>
                    <div class='col-sm-10'>
                      <img src=../foto_banner/$r[gambar]>
                    </div>
                  </div>
                  <div class='form-group row'>
                    <label class='col-sm-2 col-form-label'>Ganti Gambar</label>
                    <div class='col-sm-10'>
                      <input type='file' class='form-control' name='fupload' size=40>
                    </div>
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
    break;  
}
?>
