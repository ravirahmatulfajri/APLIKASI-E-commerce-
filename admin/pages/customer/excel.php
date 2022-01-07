<?php
// Load file koneksi.php
include "../../../lib/config.php";
include "../../../lib/koneksi.php";
// Load file autoload.php
require 'vendor/autoload.php';
// Include librari PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
// Buat sebuah variabel untuk menampung pengaturan style dari header utama
$style_h = [
  'font' => ['bold' => true, 'size' => 20], // Set font nya jadi bold dan ukuran berubah
  'alignment' => [
    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
  ]
];
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
$sheet->setCellValue('A1', "Daftar Customer"); // Set kolom A1 dengan tulisan
$sheet->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
$sheet->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
// Buat header tabel nya pada baris ke 4
$sheet->setCellValue('A3', "No"); // Set kolom A4 dengan tulisan 
$sheet->setCellValue('B3', "Nama Lengkap"); // Set kolom B4 dengan tulisan
$sheet->setCellValue('C3', "Alamat"); // Set kolom C4 dengan tulisan 
$sheet->setCellValue('D3', "Email"); // Set kolom D4 dengan tulisan 
$sheet->setCellValue('E3', "Telpon"); // Set kolom E4 dengan tulisan
// Apply style header yang telah kita buat tadi ke masing-masing kolom header
$sheet->getStyle('A1:E1')->applyFromArray($style_h);
$sheet->getStyle('A3')->applyFromArray($style_col);
$sheet->getStyle('B3')->applyFromArray($style_col);
$sheet->getStyle('C3')->applyFromArray($style_col);
$sheet->getStyle('D3')->applyFromArray($style_col);
$sheet->getStyle('E3')->applyFromArray($style_col);
// Set height baris ke 1
$sheet->getRowDimension('1')->setRowHeight(20);

// Query untuk merelasikan kedua tabel di filter berdasarkan tanggal
$sql = mysqli_query($koneksi,"SELECT * FROM kustomer");
$no = 1; // Untuk penomoran tabel, di awal set dengan 1
$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 5
while($data = mysqli_fetch_array($sql)){ 
  $sheet->setCellValue('A'.$numrow, $no);
  $sheet->setCellValue('B'.$numrow, $data['nama_lengkap']);
  $sheet->setCellValue('C'.$numrow, $data['alamat']);
  $sheet->setCellValue('D'.$numrow, $data['email']);
  $sheet->setCellValue('E'.$numrow, $data['telpon']);
  // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
  $sheet->getStyle('A'.$numrow)->applyFromArray($style_row);
  $sheet->getStyle('B'.$numrow)->applyFromArray($style_row);
  $sheet->getStyle('C'.$numrow)->applyFromArray($style_row);
  $sheet->getStyle('D'.$numrow)->applyFromArray($style_row);
  $sheet->getStyle('E'.$numrow)->applyFromArray($style_row);
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
// Set orientasi kertas jadi LANDSCAPE
$sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
// Set judul file sheet nya
$sheet->setTitle("Laporan Data Customer");
$sheet;
// Proses file sheet
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Detail_Transaksi_Account.xlsx"'); // Set nama file sheet nya
header('Cache-Control: max-age=0');
$writer = new Xlsx($spreadsheet);
ob_end_clean();
$writer->save('php://output');
?>