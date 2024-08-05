<?php
// Mulai output buffering
ob_start();

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Koneksi ke database
require 'koneksi.php';

// Query untuk mengambil data dari tabel report
$query_sql = "SELECT * FROM report";
$result = mysqli_query($conn, $query_sql);

// Membuat objek spreadsheet baru
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Menulis header kolom
$sheet->setCellValue('A1', 'id');
$sheet->setCellValue('B1', 'tanggal');
$sheet->setCellValue('C1', 'total_harga');

// Menulis data dari database ke spreadsheet
if (mysqli_num_rows($result) > 0) {
    $rowNum = 2; // Dimulai dari baris kedua
    while ($row = mysqli_fetch_assoc($result)) {
        $sheet->setCellValue('A' . $rowNum, $row['id']);
        $sheet->setCellValue('B' . $rowNum, $row['tanggal']);
        $sheet->setCellValue('C' . $rowNum, $row['total_harga']);
        $rowNum++;
    }
}

// Menyimpan spreadsheet sebagai file Excel
$writer = new Xlsx($spreadsheet);
$filename = 'Report-' . date('Y-m-d') . '.xlsx';

// Bersihkan buffer output
ob_end_clean();

// Menyediakan file untuk diunduh
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="' . $filename . '"');
header('Cache-Control: max-age=0');

$writer->save('php://output');
exit;
?>
