<?php 
   include "../../../lib/fungsi_thumb.php";
   $act=$_GET['act'];

// Hapus artikel
   if ($act=='hapus'){
      $data=mysqli_fetch_array(mysqli_query($koneksi,"SELECT gambar FROM artikel WHERE id_artikel='$_GET[id_artikel]'"));
      if ($data['gambar']!=''){
         $queryHapus = mysqli_query($koneksi,"DELETE FROM artikel WHERE id_artikel='$_GET[id_artikel]'");
         unlink("../../../foto_artikel/$_GET[namafile]");   
         unlink("../../../foto_artikel/small_$_GET[namafile]");   
         if($queryHapus){
            echo "<script> alert('Data artikel Berhasil Di hapus'); window.location = '$admin_url'+'main.php?pages=artikel&act=';</script>";
         } else {
            echo "<script> alert('Data artikel Gagal Di hapus'); window.location = '$admin_url'+'main.php?pages=artikel&act=';</script>"; 
         }
      }
      else{
         $queryHapus = mysqli_query($koneksi,"DELETE FROM artikel WHERE id_artikel='$_GET[id_artikel]'");
         if($queryHapus){
            echo "<script> alert('Data artikel Berhasil Di hapus'); window.location = '$admin_url'+'main.php?pages=artikel&act=';</script>";
         } else {
            echo "<script> alert('Data artikel Gagal Di hapus'); window.location = '$admin_url'+'main.php?pages=artikel&act=';</script>"; 
         }
      }


      $queryHapus = mysqli_query($koneksi,"DELETE FROM artikel WHERE id_artikel='$_GET[id_artikel]'");
      if($queryHapus){
         echo "<script> alert('Data artikel Berhasil Di hapus'); window.location = '$admin_url'+'main.php?pages=artikel&act=';</script>";
      } else {
         echo "<script> alert('Data artikel Gagal Di hapus'); window.location = '$admin_url'+'main.php?pages=artikel&act=';</script>"; 
      }
   }
   // Input artikel
elseif ($act=='input'){
   $lokasi_file    = $_FILES['fupload']['tmp_name'];
   $tipe_file      = $_FILES['fupload']['type'];
   $nama_file      = $_FILES['fupload']['name'];
   $acak           = rand(1,99);
   $nama_file_unik = $acak.$nama_file; 
 
   $artikel_seo      = seo_title($_POST['nama_artikel']);
 
   // Apabila ada gambar yang diupload
   if (!empty($lokasi_file)){
     if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg"){
     echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
         window.location=('../../main.php?pages=artikel)</script>";
     }
     else{
     UploadArtikel($nama_file_unik);
 
     $querySimpan = mysqli_query($koneksi, "INSERT INTO artikel(judul,
                                     judul_seo,
                                     headline,
                                     isi_artikel,
                                     hari,
                                     tanggal,
                                     jam,
                                     gambar,
                                     tag) 
                             VALUES('$_POST[nama_artikel]',
                                    '$artikel_seo',
                                    'Y',
                                    '$_POST[deskripsi]',
                                    '$hari_ini',
                                    '$tgl_sekarang',
                                    '$jam_sekarang',
                                    '$nama_file_unik',
                                    'hotnews')");
      if($querySimpan) {
         echo"<script> alert('Data artikel Berhasil Masuk'); window.location = '$admin_url'+'main.php?pages=artikel&act='; </script>"; 
      } else {
         echo "<script> alert('Data artikel Gagal Masuk'); window.location = '$admin_url'+'main.php?pages=artikel&act=';</script>";
      }
   }
   }
   else{
      $querySimpan = mysqli_query($koneksi, "INSERT INTO artikel(judul,
                                       judul_seo,
                                       headline,
                                       isi_artikel,
                                       hari,
                                       tanggal,
                                       jam,
                                       tag) 
                             VALUES('$_POST[nama_artikel]',
                                    '$artikel_seo',
                                    'Y',
                                    '$_POST[deskripsi]',
                                    '$hari_ini',
                                    '$tgl_sekarang',
                                    '$jam_sekarang',
                                    'hotnews')");
      if($querySimpan) {
         echo"<script> alert('Data artikel Tanpa gambar Berhasil Masuk'); window.location = '$admin_url'+'main.php?pages=artikel&act='; </script>"; 
      } else {
         echo "<script> alert('Data artikel Tanpa gambar Gagal Masuk'); window.location = '$admin_url'+'main.php?pages=artikel&act=';</script>";
      }
   }
 }

// Update artikel
elseif ($act=='update'){
   $lokasi_file    = $_FILES['fupload']['tmp_name'];
   $tipe_file      = $_FILES['fupload']['type'];
   $nama_file      = $_FILES['fupload']['name'];
   $acak           = rand(1,99);
   $nama_file_unik = $acak.$nama_file; 
 
   $artikel_seo      = seo_title($_POST['nama_artikel']);
 
   // Apabila gambar tidak diganti
   if (empty($lokasi_file)){
   $querySimpan = mysqli_query($koneksi, "UPDATE artikel SET judul = '$_POST[nama_artikel]',
                                    judul_seo   = '$artikel_seo', 
                                    headline    = 'Y',
                                    isi_artikel = '$_POST[deskripsi]',
                                    hari        = '$hari_ini',
                                    tanggal     = '$tgl_sekarang',
                                    jam         = '$jam_sekarang',
                                    tag         = 'hotnews'
                              WHERE id_artikel   = '$_POST[id_artikel]'");
      if($querySimpan) {
         echo"<script> alert('Data artikel tanpa gambar Berhasil Di ubah'); window.location = '$admin_url'+'main.php?pages=artikel&act='; </script>"; 
      } else {
         echo "<script> alert('Data artikel tanpa gambar Gagal Di ubah'); window.location = '$admin_url'+'main.php?pages=artikel&act=&id_artikel='+'$id_artikel';</script>";
      }
   }
   else{
     if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg"){
     echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
         window.location=('../../main.php?page=artikel)</script>";
     }
     else{
     UploadArtikel($nama_file_unik);
     $querySimpan = mysqli_query($koneksi, "UPDATE artikel SET judul = '$_POST[nama_artikel]',
                                    judul_seo   = '$artikel_seo', 
                                    headline    = 'Y',
                                    isi_artikel = '$_POST[deskripsi]',
                                    hari        = '$hari_ini',
                                    tanggal     = '$tgl_sekarang',
                                    jam         = '$jam_sekarang',
                                    tag         = 'hotnews',
                                    gambar      = '$nama_file_unik'   
                              WHERE id_artikel   = '$_POST[id_artikel]'");
      if($querySimpan) {
         echo"<script> alert('Data artikel Berhasil Di ubah'); window.location = '$admin_url'+'main.php?pages=artikel&act='; </script>"; 
         } else {
            echo "<script> alert('Data artikel Gagal Di ubah'); window.location = '$admin_url'+'main.php?pages=artikel&act=&id_artikel='+'$id_artikel';</script>";
         }
      }
   }
 } 

	
?>