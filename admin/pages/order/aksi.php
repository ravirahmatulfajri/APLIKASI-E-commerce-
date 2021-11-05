<?php 
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
  echo "<center>Untuk mengakses modul, Anda harus login dulu <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
	if ($_POST['status_order']=='Lunas'){ 
    
		// Update untuk mengurangi stok 
		mysqli_query($koneksi,"UPDATE produk,orders_detail SET produk.stok=produk.stok-orders_detail.jumlah WHERE produk.id_produk=orders_detail.id_produk and orders_detail.id_orders='$_POST[id_order]'");
		
		// Update untuk menambahkan produk yang dibeli (best seller = produk yang paling laris)
		mysqli_query($koneksi,"UPDATE produk,orders_detail SET produk.dibeli=produk.dibeli+orders_detail.jumlah WHERE produk.id_produk=orders_detail.id_produk and orders_detail.id_orders='$_POST[id_order]'");
  
		// Update status order
		mysqli_query($koneksi,"UPDATE orders SET status_order='$_POST[status_order]' where id_orders='$_POST[id_order]'");
  
		// Update status order
		mysqli_query($koneksi,"UPDATE orders SET status_order='$_POST[status_order]' where id_orders='$_POST[id_order]'");
  
		echo "<script> alert('Data order Berhasil Di ubah'); window.location = '$admin_url'+'main.php?pages=order&act=detailorder&id_order=$_POST[id_order]';</script>";
	  }	  
		elseif($_POST['status_order']=='Batal'){
		  // Update untuk menambah stok
		mysqli_query($koneksi,"UPDATE produk,orders_detail SET produk.stok=produk.stok+orders_detail.jumlah WHERE produk.id_produk=orders_detail.id_produk and orders_detail.id_orders='$_POST[id_order]'"); 
		  
		  // Update untuk menambahkan produk yang tidak jadi dibeli (tidak jd best seller)
		mysqli_query($koneksi,"UPDATE produk,orders_detail SET produk.dibeli=produk.dibeli-orders_detail.jumlah WHERE produk.id_produk=orders_detail.id_produk and orders_detail.id_orders='$_POST[id_order]'");
  
		  // Update status order Batal
		mysqli_query($koneksi,"UPDATE orders SET status_order='$_POST[status_order]' where id_orders='$_POST[id_order]'");
  
		  echo "<script> alert('Data order Berhasil Di ubah'); window.location = '$admin_url'+'main.php?pages=order&act=detailorder&id_order=$_POST[id_order]';</script>";
		}
	  else{
		mysqli_query($koneksi,"UPDATE orders SET status_order='$_POST[status_order]' where id_orders='$_POST[id_order]'");
		echo "<script> alert('Data order Berhasil Di ubah'); window.location = '$admin_url'+'main.php?pages=order&act=detailorder&id_order=$_POST[id_order]';</script>";
	  }
	}				
?>