<?php

namespace App\Http\Controllers;

use App\CsvDataModel;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpWord\PhpWord;
use Barryvdh\DomPDF\PDF;
use App;
class UserListImport extends \Maatwebsite\Excel\Files\ExcelFile {

    protected $delimiter = ',';
    protected $enclosure = '"';
    protected $lineEnding = '\r\n';

    public function getFile()
    {
    $file = Input::file('csv');
    $filename = $file->getRealPath();

    // Return it's location
    return $filename;
    }

    public function getFilters()
    {
        return [
            'chunk'
        ];
    }

}

class CsvController extends Controller
{
    public function getCsv()
    {
        return view('admin.include.csv');
    }

    public function getCsvImport()
    {
        return view('admin.include.csv_import');
    }

    public function postCsvImport(UserListImport $import)
    {
        $results = $import->toObject();
        $calc = 0;
        foreach($results as $row) {
            $data = CsvDataModel::create(array(
                'appno' => $row->appno,
                'tmappliedfor' => $row->tmappliedfor
            ));
            $calc++;
        }
        if($calc > 0) {
            return redirect('dashboard/csv/import')->with('global', 'Data uploaded successfully');
        }
    }

    /**
     * @return Data of CSV as JSON format
     */
    public function getData()
    {
        $data = CsvDataModel::all();
        return $data;
    }

    public function getCsvExport()
    {
        Excel::create('ExportCsv', function($excel) {
            $excel->sheet('Sheetname', function($sheet) {
                $sheet->fromModel(CsvDataModel::all());
            });

        })->export('csv');

    }


    public function getPdfExport()
    {

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML('<h1>Hello World!!</h1>');
        file_put_contents("pdf/order_email.pdf", $pdf->output());
    }

    public function getDocx()
    {
        $phpword = new \PhpOffice\PhpWord\PhpWord;
        $section = $phpword->addSection();
        // Define table style arrays
        $styleTable = array('borderSize'=>6, 'borderColor'=>'006699', 'cellMargin'=>80);
        $styleFirstRow = array('borderBottomSize'=>18, 'borderBottomColor'=>'0000FF', 'bgColor'=>'66BBFF');
        // Define cell style arrays
        $styleCell = array('valign'=>'center');
        // Define font style for first row
        $fontStyle = array('bold'=>true, 'align'=>'center');
        // Add table style
        $phpword->addTableStyle('myOwnTableStyle', $styleTable, $styleFirstRow);
        // Add table
        $table = $section->addTable('myOwnTableStyle');
        // Add row
        $table->addRow(900);
        // Add cells
        $table->addCell(2000, $styleCell)->addText('Row 1', $fontStyle);
        $table->addCell(2000, $styleCell)->addText('Row 2', $fontStyle);
        $table->addCell(2000, $styleCell)->addText('Row 3', $fontStyle);
        $table->addCell(2000, $styleCell)->addText('Row 4', $fontStyle);

        // Add more rows / cells
        for($i = 1; $i <= 10; $i++) {
            $table->addRow();
            $table->addCell(2000)->addText("Cell $i");
            $table->addCell(2000)->addText("Cell $i");
            $table->addCell(2000)->addText("Cell $i");
            $table->addCell(2000)->addText("Cell $i");

            $text = ($i % 2 == 0) ? 'X' : '';
            $table->addCell(500)->addText($text);
        }
// Save File
        $filename = 'test.docx';
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpword, 'Word2007');
        $objWriter->save($filename);
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.$filename);
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filename));
        flush();
        readfile($filename);
        unlink($filename); // deletes the temporary file
        exit;
    }

   /* public function getCsvData()
    {
        $arr1 = array();
        $arr2 = array();
        $arr3 = array();
        $arr4 = array();
        $arr5 = array();
        $y = 1;
        $x = 1;
        if (($handle = fopen("csv/la poste hexamal.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 10240, ';', '"')) !== FALSE) {

                $arr1[] = $data[0];
                $arr2[] = $data[1];
                $arr3[] = $data[2];
                $arr4[] = $data[3];
                $arr5[] = $data[4];
            }
            fclose($handle);
        }
        $arr_first = array();
        $arr_second = array();
        $arr_third = array();
        $arr_fourth = array();
        $arr_fifth = array();
        $x = 1;
        for($i = 0; $i < count($arr3); $i++) {
            if($i == 0) {
                continue;
            }
            if($i == $x) {
                continue;
            }
            $arr_first[] = $arr1[$i];
            $arr_second[] = $arr2[$i];
            $arr_third[] = $arr3[$i];
            $arr_fourth[] = $arr4[$i];
            $arr_fifth[] = $arr5[$i];
            $x += 2;
        }
        $data['first'] = $arr_first;
        //$data['second'] = $arr_second;
        //$data['third'] = $arr_third;
        //$data['fourth'] = $arr_fourth;
        //$data['fifth'] = $arr_fifth;
        //return view('admin.include.csv', $data);
        return $data['first'];

    }*/
}
