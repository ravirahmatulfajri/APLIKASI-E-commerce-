<?php
include "class.ezpdf.php";
include "rupiah.php";
include "../../../lib/config.php";
include "../../../lib/koneksi.php";
  
$pdf = new Cezpdf();
 
// Set margin dan font
$pdf->ezSetCmMargins(3, 3, 3, 3);
$pdf->selectFont('fonts/Courier.afm');

$all = $pdf->openObject();

// Tampilkan logo
$pdf->setStrokeColor(0, 0, 0, 1);
$pdf->addJpegFromFile('logo.jpg',20,800,69);

// Teks di tengah atas untuk judul header
$pdf->addText(200, 820, 16,'<b>Laporan User Order</b>');
$pdf->addText(240, 800, 14,'<b>Plaza Agro UGM</b>');


// Garis atas untuk header
$pdf->line(10, 775, 578, 775);

// Garis bawah untuk footer
$pdf->line(10, 50, 578, 50);
// Teks kiri bawah
$pdf->addText(30,34,8,'Dicetak tgl:' . date( 'd-m-Y, H:i:s'));

$pdf->closeObject();

// Tampilkan object di semua halaman
$pdf->addObject($all, 'all');

// Query untuk merelasikan kedua tabel di filter berdasarkan tanggal
$sql = mysqli_query($koneksi,"SELECT * FROM kustomer");
$jml = mysqli_num_rows($sql);

if ($jml > 0){
$i = 1;
while($r = mysqli_fetch_array($sql)){
  $data[$i]=array('<b>No</b>'=>$i, 
                  '<b>Nama Lengkap</b>'=>$r['nama_lengkap'], 
                  '<b>Alamat</b>'=>$r['alamat']);
  $i++;
}

$pdf->ezTable($data, '', '', '');

$pdf->ezText("\nJumlah User yang terdaftar : {$jml} orang");

// Penomoran halaman
$pdf->ezStartPageNumbers(320, 15, 8);
$pdf->ezStream();
}
else{
  $m=$_GET['tanggal'];
  $s=$_GET['tanggal1'];
  echo "Tidak ada transaksi/order pada Tanggal $m s/d $s";
}
?>
