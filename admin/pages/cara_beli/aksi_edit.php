<?php 
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
  echo "<center>Untuk mengakses modul, Anda harus login dulu <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {

	$id = $_POST['id'];
	$isi = $_POST['static_content'];

	$querySimpan = mysqli_query($koneksi,"UPDATE modul SET static_content='$isi' WHERE id_modul='$id'");
	if($querySimpan) {
		echo"<script> alert('Data site Berhasil Di ubah'); window.location = '$admin_url'+'main.php?pages=cara_beli'; </script>"; 
	} else {
		echo "<script> alert('Data site Gagal Di ubah'); window.location = '$admin_url'+'main.php?pages=cara_beli';</script>";
	}
	}	
?>