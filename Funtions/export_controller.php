<?php
include('Connection.php');
require '..\Librarys\vendor\autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class export_controller
{
    public static function export()
    {
        $Connection = new Connection();
		$ConnectionDb = $Connection->connect();

        $document = new Spreadsheet();
        $answer = $document->getActiveSheet();
        $answer->setTitle("Users");
        $header = ["id", "Name", "Last Name", "Identification Card"];

        $answer->fromArray($header, null, 'A1');

        $query = "SELECT * FROM users";
        $query = $ConnectionDb->prepare($query);
        $query->execute();
        $Array = $query->fetchAll(PDO::FETCH_ASSOC);
        $row = 2;

        foreach ($Array as $order) {
            
            $answer->setCellValueByColumnAndRow(1, $row, $order['id']);
            $answer->setCellValueByColumnAndRow(2, $row, $order['Name']);
            $answer->setCellValueByColumnAndRow(3, $row, $order['Last_Name']);
            $answer->setCellValueByColumnAndRow(4, $row, $order['Card']);
            $row++;
        }
         $Location = '..\Data\Excel/';

        if (!file_exists($Location)) {
            mkdir($Location);
        }
        $writer = new Xlsx($document);
        $writer->save('..\Data\Excel\table.xlsx');
    }
} 
export_controller::export();

#creator: Mateo Fonseca