<?php 
	$id=$_GET['id_testi'];
	$queryHapus = mysqli_query($koneksi, "DELETE FROM testimoni WHERE id_testi='$id'");

	if($queryHapus){
       echo "<script> alert('Data Berhasil Di hapus'); window.location = '$admin_url'+'main.php?pages=testi';</script>";
    } else {
       echo "<script> alert('Data Gagal Di hapus'); window.location = '$admin_url'+'main.php?pages=testi';</script>"; 
    }
?>