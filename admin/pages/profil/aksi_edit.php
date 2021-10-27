<?php 
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
  echo "<center>Untuk mengakses modul, Anda harus login dulu <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$lokasi_file = $_FILES['fupload']['tmp_name'];
	$nama_file   = $_FILES['fupload']['name'];

	// Apabila ada gambar yang diupload
	if (!empty($lokasi_file)){
		move_uploaded_file($lokasi_file,'foto_banner/'.$nama_file);
		$querySimpan = mysql_query("UPDATE modul SET nama_toko      = '$_POST[nama_toko]',
									meta_deskripsi = '$_POST[meta_deskripsi]',
									meta_keyword   = '$_POST[meta_keyword]',
									email_pengelola= '$_POST[email_pengelola]',
									nomor_rekening = '$_POST[nomor_rekening]',
									nomor_hp       = '$_POST[nomor_hp]',
									static_content = '$_POST[isi]',
									gambar         = '$nama_file'    
								WHERE id_modul       = '$_POST[id]'");
	}
	else{
		$querySimpan = mysql_query("UPDATE modul SET nama_toko      = '$_POST[nama_toko]',
									meta_deskripsi = '$_POST[meta_deskripsi]',
									meta_keyword   = '$_POST[meta_keyword]',
									email_pengelola= '$_POST[email_pengelola]',
									nomor_rekening = '$_POST[nomor_rekening]',
									nomor_hp       = '$_POST[nomor_hp]',
									static_content = '$_POST[isi]' 
								WHERE id_modul       = '$_POST[id]'");
	}
	}
?>