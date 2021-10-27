<?php 
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
  echo "<center>Untuk mengakses modul, Anda harus login dulu <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$nama_lengkap = $_POST['nama_lengkap'];
	$email = $_POST['email'];
	$no_telp = $_POST['no_telp'];
	$level = $_POST['level'];
	$blokir = $_POST['blokir'];

	$querySimpan = mysqli_query($koneksi,"INSERT INTO admins(username, password, nama_lengkap, email, no_telp, level, blokir) VALUES ('$username', '$password', '$nama_lengkap', '$email', '$no_telp', '$level', '$blokir')");
	if($querySimpan) {
		echo"<script> alert('Data user Berhasil Masuk'); window.location = '$admin_url'+'main.php?pages=user'; </script>"; 
	} else {
		echo "<script> alert('Data user Gagal Masuk'); window.location = '$admin_url'+'main.php?pages=tambah_user';</script>";
	}
	}				
?>