<?php 
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
  echo "<center>Untuk mengakses modul, Anda harus login dulu <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
   $act=$_GET['act'];

// Hapus produk
   if ($act=='hapus'){
      $data=mysqli_fetch_array(mysqli_query($koneksi,"SELECT gambar FROM produk WHERE id_produk='$_GET[id_produk]'"));
      if ($data['gambar']!=''){
         $queryHapus = mysqli_query($koneksi,"DELETE FROM produk WHERE id_produk='$_GET[id_produk]'");
         unlink("../../../foto_produk/$_GET[namafile]");   
         unlink("../../../foto_produk/small_$_GET[namafile]");   
         if($queryHapus){
            echo "<script> alert('Data produk Berhasil Di hapus'); window.location = '$admin_url'+'main.php?pages=produk&act=';</script>";
         } else {
            echo "<script> alert('Data produk Gagal Di hapus'); window.location = '$admin_url'+'main.php?pages=produk&act=';</script>"; 
         }
      }
      else{
         $queryHapus = mysqli_query($koneksi,"DELETE FROM produk WHERE id_produk='$_GET[id_produk]'");
         if($queryHapus){
            echo "<script> alert('Data produk Berhasil Di hapus'); window.location = '$admin_url'+'main.php?pages=produk&act=';</script>";
         } else {
            echo "<script> alert('Data produk Gagal Di hapus'); window.location = '$admin_url'+'main.php?pages=produk&act=';</script>"; 
         }
      }


      $queryHapus = mysqli_query($koneksi,"DELETE FROM produk WHERE id_produk='$_GET[id_produk]'");
      if($queryHapus){
         echo "<script> alert('Data produk Berhasil Di hapus'); window.location = '$admin_url'+'main.php?pages=produk&act=';</script>";
      } else {
         echo "<script> alert('Data produk Gagal Di hapus'); window.location = '$admin_url'+'main.php?pages=produk&act=';</script>"; 
      }
   }
   // Input produk
elseif ($act=='input'){
   $lokasi_file    = $_FILES['fupload']['tmp_name'];
   $tipe_file      = $_FILES['fupload']['type'];
   $nama_file      = $_FILES['fupload']['name'];
   $acak           = rand(1,99);
   $nama_file_unik = $acak.$nama_file; 
 
   $produk_seo      = seo_title($_POST['nama_produk']);
 
   // Apabila ada gambar yang diupload
   if (!empty($lokasi_file)){
     if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg"){
     echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
         window.location=('../../main.php?pages=produk)</script>";
     }
     else{
     UploadImage($nama_file_unik);
 
     $querySimpan = mysqli_query($koneksi, "INSERT INTO produk(nama_produk,
                                     produk_seo,
                                     id_kategori,
                                     berat,
                                     harga,
                                     diskon,
                                     stok,
                                     deskripsi,
                                     tgl_masuk,
                                     gambar) 
                             VALUES('$_POST[nama_produk]',
                                    '$produk_seo',
                                    '$_POST[kategori]',
                                    '$_POST[berat]',
                                    '$_POST[harga]',
                                    '$_POST[diskon]',
                                    '$_POST[stok]',
                                    '$_POST[deskripsi]',
                                    '$tgl_sekarang',
                                    '$nama_file_unik')");
      if($querySimpan) {
         echo"<script> alert('Data produk Berhasil Masuk'); window.location = '$admin_url'+'main.php?pages=produk&act='; </script>"; 
      } else {
         echo "<script> alert('Data produk Gagal Masuk'); window.location = '$admin_url'+'main.php?pages=produk&act=';</script>";
      }
   }
   }
   else{
      $querySimpan = mysqli_query($koneksi, "INSERT INTO produk(nama_produk,
                                     produk_seo,
                                     id_kategori,
                                     berat,
                                     harga,
                                     diskon,
                                     stok,
                                     deskripsi,
                                     tgl_posting) 
                             VALUES('$_POST[nama_produk]',
                                    '$produk_seo',
                                    '$_POST[kategori]',
                                    '$_POST[berat]',                                 
                                    '$_POST[harga]',
                                    '$_POST[harga]',
                                    '$_POST[stok]',
                                    '$_POST[deskripsi]',
                                    '$tgl_sekarang')");
      if($querySimpan) {
         echo"<script> alert('Data produk Berhasil Masuk'); window.location = '$admin_url'+'main.php?pages=produk&act='; </script>"; 
      } else {
         echo "<script> alert('Data produk Gagal Masuk'); window.location = '$admin_url'+'main.php?pages=produk&act=';</script>";
      }
   }
 }

// Update produk
elseif ($act=='update'){
   $lokasi_file    = $_FILES['fupload']['tmp_name'];
   $tipe_file      = $_FILES['fupload']['type'];
   $nama_file      = $_FILES['fupload']['name'];
   $acak           = rand(1,99);
   $nama_file_unik = $acak.$nama_file; 
 
   $produk_seo      = seo_title($_POST['nama_produk']);
 
   // Apabila gambar tidak diganti
   if (empty($lokasi_file)){
   $querySimpan = mysqli_query($koneksi, "UPDATE produk SET nama_produk = '$_POST[nama_produk]',
                                    produk_seo  = '$produk_seo', 
                                    id_kategori = '$_POST[kategori]',
                                    berat       = '$_POST[berat]',
                                    harga       = '$_POST[harga]',
                                    diskon      = '$_POST[diskon]',
                                    stok        = '$_POST[stok]',
                                    deskripsi   = '$_POST[deskripsi]'
                              WHERE id_produk   = '$_POST[id_produk]'");
      if($querySimpan) {
         echo"<script> alert('Data produk tanpa gambar Berhasil Di ubah'); window.location = '$admin_url'+'main.php?pages=produk&act='; </script>"; 
      } else {
         echo "<script> alert('Data produk tanpa gambar Gagal Di ubah'); window.location = '$admin_url'+'main.php?pages=produk&act=&id_produk='+'$id_produk';</script>";
      }
   }
   else{
     if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg"){
     echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
         window.location=('../../main.php?page=produk)</script>";
     }
     else{
     UploadImage($nama_file_unik);
     $querySimpan = mysqli_query($koneksi, "UPDATE produk SET nama_produk = '$_POST[nama_produk]',
                                    produk_seo  = '$produk_seo', 
                                    id_kategori = '$_POST[kategori]',
                                    berat       = '$_POST[berat]',
                                    harga       = '$_POST[harga]',
                                    diskon      = '$_POST[diskon]',
                                    stok        = '$_POST[stok]',
                                    deskripsi   = '$_POST[deskripsi]',
                                    gambar      = '$nama_file_unik'   
                              WHERE id_produk   = '$_POST[id_produk]'");
      if($querySimpan) {
         echo"<script> alert('Data produk Berhasil Di ubah'); window.location = '$admin_url'+'main.php?pages=produk&act='; </script>"; 
         } else {
            echo "<script> alert('Data produk Gagal Di ubah'); window.location = '$admin_url'+'main.php?pages=produk&act=&id_produk='+'$id_produk';</script>";
         }
      }
   }
 } 

	
}
?>