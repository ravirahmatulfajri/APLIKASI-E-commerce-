<?php 
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
  echo "<center>Untuk mengakses modul, Anda harus login dulu <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$username=$_GET['username'];
	$queryHapus = mysqli_query($koneksi, "DELETE FROM admins WHERE username='$username'");

	if($queryHapus){
       echo "<script> alert('Data user Berhasil Di hapus'); window.location = '$admin_url'+'main.php?pages=user';</script>";
    } else {
       echo "<script> alert('Data user Gagal Di hapus'); window.location = '$admin_url'+'main.php?pages=user';</script>"; 
    }
}
?>