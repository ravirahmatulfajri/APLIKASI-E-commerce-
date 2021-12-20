<?php
// Load file koneksi.php
include "rupiah.php";
include "../../../lib/config.php";
include "../../../lib/koneksi.php";
// Load file autoload.php
require 'vendor/autoload.php';
// Include librari PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
$style_col = [
  'font' => ['bold' => true], // Set font nya jadi bold
  'alignment' => [
    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
  ],
  'borders' => [
    'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
    'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
    'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
    'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
  ]
];
// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
$style_row = [
  'alignment' => [
    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
  ],
  'borders' => [
    'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
    'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
    'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
    'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
  ]
];
$tgl = $_GET['tanggal'];
$tgl1 = $_GET['tanggal1'];
$tangl = date('d-F-Y', strtotime($tgl));
$tangl1 = date('d-F-Y', strtotime($tgl1));

$sheet->setCellValue('A1', "Laporan Penjualan"); // Set kolom A1 dengan tulisan
$sheet->mergeCells('A1:G1'); // Set Merge Cell pada kolom A1 sampai E1
$sheet->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
$sheet->setCellValue('A2', "Plaza Agro UGM"); // Set kolom A2 seperti A1
$sheet->mergeCells('A2:G2'); // Set Merge Cell pada kolom A2 sampai E2
$sheet->setCellValue('A3', 'Periode '. $tangl .' s/d '.  $tangl1); // Set periode
$sheet->mergeCells('A3:G3'); // Set Merge Cell pada kolom A2 sampai E2
// Buat header tabel nya pada baris ke 4
$sheet->setCellValue('A5', "No"); // Set kolom A4 dengan tulisan 
$sheet->setCellValue('B5', "Faktur"); // Set kolom B4 dengan tulisan
$sheet->setCellValue('C5', "Tanggal"); // Set kolom C4 dengan tulisan 
$sheet->setCellValue('D5', "Nama Produk"); // Set kolom D4 dengan tulisan 
$sheet->setCellValue('E5', "Qty"); // Set kolom E4 dengan tulisan
$sheet->setCellValue('F5', "Harga"); // Set kolom E4 dengan tulisan
$sheet->setCellValue('G5', "Sub Total"); // Set kolom E4 dengan tulisan
// Apply style header yang telah kita buat tadi ke masing-masing kolom header
$sheet->getStyle('A5')->applyFromArray($style_col);
$sheet->getStyle('B5')->applyFromArray($style_col);
$sheet->getStyle('C5')->applyFromArray($style_col);
$sheet->getStyle('D5')->applyFromArray($style_col);
$sheet->getStyle('E5')->applyFromArray($style_col);
$sheet->getStyle('F5')->applyFromArray($style_col);
$sheet->getStyle('G5')->applyFromArray($style_col);
// Set height baris ke 1, 2, 3 dan 4
$sheet->getRowDimension('1')->setRowHeight(20);
$sheet->getRowDimension('2')->setRowHeight(20);
$sheet->getRowDimension('3')->setRowHeight(20);
$sheet->getRowDimension('4')->setRowHeight(20);
// Baca input tanggal yang dikirimkan user
$mulai=$_GET['tanggal'];
$selesai=$_GET['tanggal1'];

// Query untuk merelasikan kedua tabel di filter berdasarkan tanggal
$sql = mysqli_query($koneksi,"SELECT orders.id_orders as faktur,DATE_FORMAT(tgl_order, '%d-%m-%Y') as tanggal,
                    nama_produk,jumlah,harga 
                    FROM orders, orders_detail, produk  
                    WHERE (orders_detail.id_produk=produk.id_produk) 
                    AND (orders_detail.id_orders=orders.id_orders) 
                    AND (orders.status_order='Lunas') 
                    AND (orders.tgl_order BETWEEN '$mulai' AND '$selesai')");
$no = 1; // Untuk penomoran tabel, di awal set dengan 1
$numrow = 6; // Set baris pertama untuk isi tabel adalah baris ke 5
while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
  $quantityharga=rp($data['jumlah']*$data['harga']);
  $hargarp=rp($data['harga']);
  $sheet->setCellValue('A'.$numrow, $no);
  $sheet->setCellValue('B'.$numrow, $data['faktur']);
  $sheet->setCellValue('C'.$numrow, $data['tanggal']);
  $sheet->setCellValue('D'.$numrow, $data['nama_produk']);
  $sheet->setCellValue('E'.$numrow, $data['jumlah']);
  $sheet->setCellValue('F'.$numrow, $hargarp);
  $sheet->setCellValue('G'.$numrow, $quantityharga);
  // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
  $sheet->getStyle('A'.$numrow)->applyFromArray($style_row);
  $sheet->getStyle('B'.$numrow)->applyFromArray($style_row);
  $sheet->getStyle('C'.$numrow)->applyFromArray($style_row);
  $sheet->getStyle('D'.$numrow)->applyFromArray($style_row);
  $sheet->getStyle('E'.$numrow)->applyFromArray($style_row);
  $sheet->getStyle('F'.$numrow)->applyFromArray($style_row);
  $sheet->getStyle('G'.$numrow)->applyFromArray($style_row);
  $sheet->getRowDimension($numrow)->setRowHeight(20);
  $no++; // Tambah 1 setiap kali looping
  $numrow++; // Tambah 1 setiap kali looping
}
// Set width kolom
$sheet->getColumnDimension('A')->setWidth(15); // Set width kolom A
$sheet->getColumnDimension('B')->setWidth(18); // Set width kolom B
$sheet->getColumnDimension('C')->setWidth(25); // Set width kolom C
$sheet->getColumnDimension('D')->setWidth(20); // Set width kolom D
$sheet->getColumnDimension('E')->setWidth(20); // Set width kolom E
$sheet->getColumnDimension('F')->setWidth(20); // Set width kolom F
$sheet->getColumnDimension('G')->setWidth(20); // Set width kolom G
// Set orientasi kertas jadi LANDSCAPE
$sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
// Set judul file sheet nya
$sheet->setTitle("Laporan Data Transaksi");
$sheet;
// Proses file sheet
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Detail_Transaksi_Account.xlsx"'); // Set nama file sheet nya
header('Cache-Control: max-age=0');
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
?>