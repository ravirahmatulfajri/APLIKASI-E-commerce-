<?php 
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
  echo "<center>Untuk mengakses modul, Anda harus login dulu <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$id_con=$_GET['id_con'];
	$queryHapus = mysqli_query($koneksi, "DELETE FROM tb_contact_us WHERE id_con='$id_con'");

	if($queryHapus){
       echo "<script> alert('Data user Berhasil Di hapus'); window.location = '$admin_url'+'main.php?pages=messages';</script>";
    } else {
       echo "<script> alert('Data user Gagal Di hapus'); window.location = '$admin_url'+'main.php?pages=messages';</script>"; 
    }
}
?>