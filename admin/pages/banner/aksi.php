<?php
$act=$_GET['act'];

// Hapus banner
if ($act=='hapus'){
  $data=mysqli_fetch_array(mysqli_query($koneksi,"SELECT gambar FROM banner WHERE id_banner='$_GET[id]'"));
  if ($data['gambar']!=''){
     mysqli_query($koneksi,"DELETE FROM banner WHERE id_banner='$_GET[id]'");
     unlink("../../../foto_banner/$_GET[namafile]");   
  }
  else{
    mysqli_query($koneksi,"DELETE FROM banner WHERE id_banner='$_GET[id]'");
  }
  echo "<script>window.location = '$admin_url'+'main.php?pages=banner&act=';</script>";
}

// Input banner
elseif ($act=='input'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];
  $tipe_file   = $_FILES['fupload']['type'];

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg"){
    echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
        window.location=('../../main.php?pages=banner&act=)</script>";
    }
    else{
    UploadBanner($nama_file);
    mysqli_query($koneksi,"INSERT INTO banner(judul,
                                    url,
                                    tgl_posting,
                                    gambar) 
                            VALUES('$_POST[judul]',
                                   '$_POST[url]',
                                   '$tgl_sekarang',
                                   '$nama_file')");
  echo "<script>window.location = '$admin_url'+'main.php?pages=banner&act=';</script>";
  }
  }
  else{
    mysqli_query($koneksi,"INSERT INTO banner(judul,
                                    tgl_posting,
                                    url) 
                            VALUES('$_POST[judul]',
                                   '$tgl_sekarang',
                                   '$_POST[url]')");
  echo "<script>window.location = '$admin_url'+'main.php?pages=banner&act=';</script>";
  }
}

// Update banner
elseif ($act=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];
  $tipe_file   = $_FILES['fupload']['type'];

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysqli_query($koneksi,"UPDATE banner SET judul     = '$_POST[judul]',
                                   url       = '$_POST[url]'
                             WHERE id_banner = '$_POST[id]'");
  echo "<script>window.location = '$admin_url'+'main.php?pages=banner&act=';</script>";
  }
  else{
    if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg"){
    echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
        window.location=('../../main.php?pages=banner&act=)</script>";
    }
    else{
    UploadBanner($nama_file);
    mysqli_query($koneksi,"UPDATE banner SET judul     = '$_POST[judul]',
                                   url       = '$_POST[url]',
                                   gambar    = '$nama_file'   
                             WHERE id_banner = '$_POST[id]'");
  echo "<script>window.location = '$admin_url'+'main.php?pages=banner&act=';</script>";
  }
  }
}
?>
