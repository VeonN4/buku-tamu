<?php
include './models/Tamu.php';
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$action = $_GET['action'] ?? null;
$status = null;

switch ($action) {
    case 'export':
        $date_awal = $_GET['date_awal'];
        $date_akhir = $_GET['date_akhir'];

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        $sheet->setCellValue('A1', "No");
        $sheet->setCellValue('B1', "Tanggal");
        $sheet->setCellValue('C1', "Nama Tamu");
        $sheet->setCellValue('D1', "Alamat");
        $sheet->setCellValue('E1', "No. HP");
        $sheet->setCellValue('F1', "Bertemu");
        $sheet->setCellValue('G1', "Kepentingan");

        $data = getTamuBetweenDate($date_awal, $date_akhir);

        $i = 2;
        foreach ($data as $key => $value) {
            $sheet->setCellValue("A$i", $value['id_tamu']);
            $sheet->setCellValue("B$i", $value['tanggal']);
            $sheet->setCellValue("C$i", $value['nama_tamu']);
            $sheet->setCellValue("D$i", $value['alamat']);
            $sheet->setCellValue("E$i", $value['no_hp']);
            $sheet->setCellValue("F$i", $value['bertemu']);
            $sheet->setCellValue("G$i", $value['kepentingan']);
            $i++;
        }

        $filename = "Laporan Buku Tamu.xlsx";

        $write = new Xlsx($spreadsheet);
        $write->save($filename);
        echo "<script>window.location = '$filename' </script>";

        break;
}

?>
