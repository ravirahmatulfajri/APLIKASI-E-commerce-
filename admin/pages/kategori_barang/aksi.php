<?php 
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
  echo "<center>Untuk mengakses modul, Anda harus login dulu <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
   $act=$_GET['act'];
   if ($act=='hapus'){
      $id_kategori=$_GET['id_kategori'];
      $queryHapus = mysqli_query($koneksi, "DELETE FROM kategori WHERE id_kategori='$id_kategori'");

      if($queryHapus){
         echo "<script> alert('Data Kategori Berhasil Di hapus'); window.location = '$admin_url'+'main.php?pages=kategori_barang&act=';</script>";
      } else {
         echo "<script> alert('Data Kategori Gagal Di hapus'); window.location = '$admin_url'+'main.php?pages=kategori_barang&act=';</script>"; 
      }
   }
   elseif ($act=='input'){
      $nama = $_POST['nama_kategori'];
      $kategori_seo = seo_title($_POST['nama_kategori']);
      $querySimpan = mysqli_query($koneksi,"INSERT INTO kategori(nama_kategori,kategori_seo) VALUES ('$nama','$kategori_seo')");
      if($querySimpan) {
         echo"<script> alert('Data Kategori Berhasil Masuk'); window.location = '$admin_url'+'main.php?pages=kategori_barang&act='; </script>"; 
      } else {
         echo "<script> alert('Data Kategori Gagal Masuk'); window.location = '$admin_url'+'main.php?pages=kategori_barang&act=tambahkategori';</script>";
      }
   }
   elseif ($act=='update'){
      $nama = $_POST['nama_kategori'];
      $id_kategori=$_POST['id_kategori'];
      $kategori_seo = seo_title($_POST['nama_kategori']);
      $querySimpan = mysqli_query($koneksi,"UPDATE kategori SET nama_kategori='$nama', kategori_seo='$kategori_seo' WHERE id_kategori='$id_kategori'");
      if($querySimpan) {
         echo"<script> alert('Data Kategori Berhasil Di ubah'); window.location = '$admin_url'+'main.php?pages=kategori_barang&act='; </script>"; 
      } else {
         echo "<script> alert('Data Kategori Gagal Di ubah'); window.location = '$admin_url'+'main.php?pages=kategori_barang&act=editkategori&id_kategori='+'$id_kategori';</script>";
      }
   }
}
?>