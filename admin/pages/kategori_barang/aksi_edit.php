<?php 
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
  echo "<center>Untuk mengakses modul, Anda harus login dulu <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$id_kategori = $_POST['id_kategori'];
	$nama = $_POST['nama_kategori'];
	$querySimpan = mysqli_query($koneksi,"UPDATE kategori SET nama_kategori='$nama' WHERE id_kategori='$id_kategori'");
	if($querySimpan) {
		echo"<script> alert('Data Kategori Berhasil Di ubah'); window.location = '$admin_url'+'main.php?pages=kategori_barang'; </script>"; 
	} else {
		echo "<script> alert('Data Kategori Gagal Di ubah'); window.location = '$admin_url'+'main.php?pages=edit_kategori_barang&id_kategori='+'$id_kategori';</script>";
	}
	}				
?>