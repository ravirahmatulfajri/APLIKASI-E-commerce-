<?php 
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
  echo "<center>Untuk mengakses modul, Anda harus login dulu <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$nama_kategori = $_POST['nama_kategori'];

	$querySimpan = mysqli_query($koneksi,"INSERT INTO kategori(nama_kategori) VALUES ('$nama_kategori')");
	if($querySimpan) {
		echo"<script> alert('Data Kategori Berhasil Masuk'); window.location = '$admin_url'+'main.php?pages=kategori_barang'; </script>"; 
	} else {
		echo "<script> alert('Data Kategori Gagal Masuk'); window.location = '$admin_url'+'main.php?pages=tambah_kategori_barang';</script>";
	}
	}				
?>