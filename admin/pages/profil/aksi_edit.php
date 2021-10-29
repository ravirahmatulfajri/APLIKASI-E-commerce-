<?php 
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
  echo "<center>Untuk mengakses modul, Anda harus login dulu <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";
	include "../../../lib/fungsi_thumb.php";

	$lokasi_file = $_FILES['fupload']['tmp_name'];
	$nama_file   = $_FILES['fupload']['name'];

	// Apabila ada gambar yang diupload
	if (!empty($lokasi_file)){
		UploadBanner($nama_file);
		move_uploaded_file($lokasi_file,'foto_banner/'.$nama_file);
		$querySimpan = mysqli_query($koneksi,"UPDATE modul SET nama_toko      = '$_POST[nama_toko]',
									meta_deskripsi = '$_POST[meta_deskripsi]',
									meta_keyword   = '$_POST[meta_keyword]',
									email_pengelola= '$_POST[email_pengelola]',
									nomor_rekening = '$_POST[nomor_rekening]',
									nomor_hp       = '$_POST[nomor_hp]',
									static_content = '$_POST[static_content]',
									gambar         = '$nama_file'    
								WHERE id_modul       = '$_POST[id]'");
								if($querySimpan) {
									echo"<script> alert('Data profil Berhasil Masuk'); window.location = '$admin_url'+'main.php?pages=profil'; </script>"; 
								} else {
									echo "<script> alert('Data profil Gagal Masuk'); window.location = '$admin_url'+'main.php?pages=profil';</script>";
								}
	}
	else{
		$querySimpan = mysqli_query($koneksi,"UPDATE modul SET nama_toko      = '$_POST[nama_toko]',
									meta_deskripsi = '$_POST[meta_deskripsi]',
									meta_keyword   = '$_POST[meta_keyword]',
									email_pengelola= '$_POST[email_pengelola]',
									nomor_rekening = '$_POST[nomor_rekening]',
									nomor_hp       = '$_POST[nomor_hp]',
									static_content = '$_POST[static_content]' 
								WHERE id_modul       = '$_POST[id]'");
								if($querySimpan) {
									echo"<script> alert('Data profil tanpa gambar Berhasil Masuk'); window.location = '$admin_url'+'main.php?pages=profil'; </script>"; 
								} else {
									echo "<script> alert('Data profil tanpa gambar Gagal Masuk'); window.location = '$admin_url'+'main.php?pages=profil';</script>";
								}
	}
	}
?>