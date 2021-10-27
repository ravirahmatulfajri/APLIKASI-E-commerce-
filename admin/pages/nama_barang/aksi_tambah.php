<?php 
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
  echo "<center>Untuk mengakses modul, Anda harus login dulu <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$nm_kamar = $_POST['nm_kamar'];
	$fasilitas = $_POST['fasilitas'];
	$status = $_POST['status'];
	$tipe_kamar = $_POST['tipe_kamar'];

	$querySimpan = mysqli_query($koneksi,"INSERT INTO tb_kamar(nm_kamar, fasilitas, status, tipe) VALUES ('$nm_kamar', '$fasilitas', '$status', '$tipe_kamar')");
	if($querySimpan) {
		echo"<script> alert('Data kamar Berhasil Masuk'); window.location = '$admin_url'+'main.php?pages=kamar'; </script>"; 
	} else {
		echo "<script> alert('Data Kamar Gagal Masuk'); window.location = '$admin_url'+'main.php?pages=tambah_kamar';</script>";
	}
	}				
?>