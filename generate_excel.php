<?php
require 'PHPExcel-1.8/Classes/PHPExcel/.php'; // Load PhpSpreadsheet library

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Create new PhpSpreadsheet object
$spreadsheet = new Spreadsheet();

// Set document properties
$spreadsheet->getProperties()->setCreator("Your Name")
                             ->setLastModifiedBy("Your Name")
                             ->setTitle("Expense Report")
                             ->setSubject("Expense Report")
                             ->setDescription("Expense Report")
                             ->setKeywords("expense")
                             ->setCategory("Expense");

// Add data to the Excel file
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'Category');
$sheet->setCellValue('B1', 'Price');

// Fetch data from the database
include('config.php'); // Assuming you have a separate file for database connection
$res = mysqli_query($con, "SELECT sum(expense.price) as price, category.name FROM expense, category WHERE expense.category_id=category.id AND expense.added_by='".$_SESSION['UID']."' $sub_sql  GROUP BY expense.category_id");

$row = 2; // Start from row 2 to leave space for headers
while($row_data = mysqli_fetch_assoc($res)) {
    $sheet->setCellValue('A'.$row, $row_data['name']);
    $sheet->setCellValue('B'.$row, $row_data['price']);
    $row++;
}

// Set active sheet index to the first sheet
$spreadsheet->setActiveSheetIndex(0);

// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="expense_report.xlsx"');
header('Cache-Control: max-age=0');

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
exit;
?>
