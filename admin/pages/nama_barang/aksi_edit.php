<?php 
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
  echo "<center>Untuk mengakses modul, Anda harus login dulu <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$id_kamar = $_POST['id_kamar'];
	$nama = $_POST['nm_kamar'];
	$tipe = $_POST['tipe_kamar'];
	$fasilitas = $_POST['fasilitas'];
	$status = $_POST['status'];

	$querySimpan = mysqli_query($koneksi,"UPDATE tb_kamar SET nm_kamar='$nama', tipe='$tipe', fasilitas='$fasilitas', status='$status' WHERE id_kamar='$id_kamar'");
	if($querySimpan) {
		echo"<script> alert('Data Kamar Berhasil Di ubah'); window.location = '$admin_url'+'main.php?pages=kamar'; </script>"; 
	} else {
		echo "<script> alert('Data Kamar Gagal Di ubah'); window.location = '$admin_url'+'main.php?pages=edit_kamar&id_kamar='+'$id_kamar';</script>";
	}
	}				
?>