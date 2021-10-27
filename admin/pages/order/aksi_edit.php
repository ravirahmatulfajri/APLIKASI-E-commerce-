<?php 
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
  echo "<center>Untuk mengakses modul, Anda harus login dulu <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$id_order = $_POST['id_order'];
	$nama = $_POST['nama_order'];
	$jenis_order = $_POST['jenis_order'];
	$harga = $_POST['harga'];

	$querySimpan = mysqli_query($koneksi,"UPDATE tb_order SET nm_order='$nama', id_jenis='$jenis_order', harga='$harga' WHERE id='$id_order'");
	if($querySimpan) {
		echo"<script> alert('Data Order Berhasil Di ubah'); window.location = '$admin_url'+'main.php?pages=order'; </script>"; 
	} else {
		echo "<script> alert('Data Order Gagal Di ubah'); window.location = '$admin_url'+'main.php?pages=edit_order&id_order='+'$id_order';</script>";
	}
	}				
?>