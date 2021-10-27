<?php 
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
  echo "<center>Untuk mengakses modul, Anda harus login dulu <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$id_kategori=$_GET['id_kategori'];
	$queryHapus = mysqli_query($koneksi, "DELETE FROM kategori WHERE id_kategori='$id_kategori'");

	if($queryHapus){
       echo "<script> alert('Data Kategori Berhasil Di hapus'); window.location = '$admin_url'+'main.php?pages=kategori_barang';</script>";
    } else {
       echo "<script> alert('Data Kategori Gagal Di hapus'); window.location = '$admin_url'+'main.php?pages=kategori_barang';</script>"; 
    }
}
?>