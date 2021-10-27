<?php 
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
  echo "<center>Untuk mengakses modul, Anda harus login dulu <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$id_kamar=$_GET['id_kamar'];
	$queryHapus = mysqli_query($koneksi, "DELETE FROM tb_kamar WHERE id_kamar='$id_kamar'");

	if($queryHapus){
       echo "<script> alert('Data Kamar Berhasil Di hapus'); window.location = '$admin_url'+'main.php?pages=kamar';</script>";
    } else {
       echo "<script> alert('Data Kamar Gagal Di hapus'); window.location = '$admin_url'+'main.php?pages=kamar';</script>"; 
    }
}
?>