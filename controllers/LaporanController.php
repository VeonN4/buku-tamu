<?php
include './models/Tamu.php';
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$action = $_GET['action'] ?? null;
$status = null;

switch ($action) {
    case 'export':
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        $sheet->setCellValue('A1', "No");
        $sheet->setCellValue('B1', "No");
        $sheet->setCellValue('C1', "No");
        $sheet->setCellValue('D1', "No");
        $sheet->setCellValue('E1', "No");
        $sheet->setCellValue('F1', "No");
        $sheet->setCellValue('G1', "No");

        break;
}

?>