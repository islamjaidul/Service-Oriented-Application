<?php
namespace App\Http\Controllers\API;

use App\CustomerApiModel;
use App\Http\Controllers\Customer\CustomerAddressController;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Customer\CustomerTokenController;
use Barryvdh\DomPDF\PDF;
use App;
class RestApiController extends Controller
{

    /**
     * @param $file_name | expect file name of the file
     * @param $type | expect type of the file or extension of the file
     * @return downloadable file
     */
    public function getFile($file_name = null, $type = null)
    {
        header('Content-Type: application/'.$type.'');
        header('Content-Disposition: attachment; filename='.$file_name.'.'.$type.'');
        header('Pragma: no-cache');
        if($type == 'docx')
            readfile("".asset('docx/'.$file_name.'.'.$type.'')."");
        else if($type == 'csv')
            readfile("".asset('csv/'.$file_name.'.'.$type.'')."");
        else if($type == 'pdf')
            readfile("".asset('pdf/'.$file_name.'.'.$type.'')."");
        //unlink("".asset('csv/test.csv')."");
    }

    /**
     * @param array $data | expect the array value and check the availability
     * @return Validation true or false
     */
    public function dataValidation($data = array())
    {
        $output = ['table', 'plain'];
        $type = ['csv', 'docx', 'pdf'];
        $validate = true;
        //Find the API key in the database for matching
        $customer_api = CustomerApiModel::all()->where('api_key', $data['key'])->toArray();

        //Check the output for matching with availability
        if(!in_array($data['output'], $output)) {
            echo '<h4 style="color:red">!! Invalid output value !!</h4>';
            $validate = false;
        }
        //Checking the output should be plain only for type of pdf
        if($data['output'] == 'plain' && $data['type'] != 'pdf') {
            echo '<h4 style="color:red">!! You must use "plain" as output during the type of "pdf"!!</h4>';
            $validate = false;
        }
        //Checking the output should be table only with type of pdf
        if($data['output'] == 'table' && $data['type'] == 'pdf') {
            echo '<h4 style="color:red">!! You cannot use "table" as output during the type of "pdf", you have to use plain as output!!</h4>';
            $validate = false;
        }
        //Check the type for matching with availability
        if(!in_array($data['type'], $type)) {
            echo '<h4 style="color:red">!! Invalid type value !!</h4>';
            $validate = false;
        }
        //If there are no any api key
        if(count($customer_api) == 0) {
            echo '<h4 style="color:red">!! Invalid API key value !!</h4>';
            $validate = false;
        }
        //Check the data is HTML tag or array
        if(!is_array($data['data'])) {
            if($data['data'] == strip_tags($data['data'])) {
                echo '<h4 style="color:red">!! Invalid data value, value should be an array or HTML tag !!</h4>';
                $validate = false;
            }
        }
        //Check the token is 0. If it is 0 then the API cannot be use, user need to apply for token
        if($this->tokenHandler($data['key']) == 0) {
            echo '<h4 style="color:red">Your token is over, please apply for new token from user panel</h4>';
            $validate = false;
        }
        return $validate;
    }

    /**
     * @param $key | API key
     * @return int
     */
    public function tokenHandler($key)
    {
        $check_token = CustomerApiModel::all()->where('api_key', $key);
        $remaining_token = 0;
        if(count($check_token) > 0) {
            foreach($check_token as $row) {
                $remaining_token = $row->remaining_api_token;
                break;
            }
            return $remaining_token;
        } else {
            //This i return because for validation
            //If the API key is missing then in the validation it becomes false inside the validation
            //So when remaining token is available but token is mismatch then it return 1
            //It means not show the validation error in line number 81 of the method of dataValidation
            return 1;
        }
    }

    /**
     * This is the method which include all credential of API
     * @param $api_key | Expect API key
     * @param $actual_address | Expect API uses website address
     * @return void
     */
    public function customerCredential($api_key, $actual_address) {
        $customer_token = new CustomerTokenController();
        $api_uses_website_address = new CustomerApiUsesController();
        $customer_token->updateUsesToken($api_key);
        $api_uses_website_address->getApiUsesWebsiteInfo($api_key, $actual_address);
    }

    /**
     * Expect data from API
     * @return CSV
     */
    public function postCsvApi()
    {
        //Data is fetching from API
        $fetch = json_decode(file_get_contents("php://input"), true);
        if($this->dataValidation($fetch) != false) {
            $data = $fetch['data'];
            $file_name = $fetch['as'];
            $type = $fetch['type'];
            Excel::create($file_name, function($excel) use($data) {
                $excel->sheet('Sheetname', function($sheet) use($data){
                    $sheet->fromArray($data);
                });

            })->store('csv', 'csv/');

            //API key and API uses address send to customerCredential as parameter
            //API Token is reduce 1 per API request
            $this->customerCredential($fetch['key'], $fetch['actual_address']);

            return 'Please download the CSV file <a href="'.url('api/file/get/'.$file_name.'/'.$type.'').'">Download</a>';
        } else {
            return ' <h2 style="color:red">Access Denied</h2>';
        }
    }

    /**
     * Expect data from API
     * @return Docx
     */
    public function postDocxApi()
    {
        //Data is fetching from API
    	$fetch = json_decode(file_get_contents("php://input"), true);
        if($this->dataValidation($fetch) != false) {
            $data = $fetch['data'];
            $file_name = $fetch['as'];
            $type = $fetch['type'];
            $keys = array_keys($data[0]);
            $this->getDocxTemplate($data, $keys, $file_name);

            //API key and API uses address send to customerCredential as parameter
            //API Token is reduce 1 per API request
            $this->customerCredential($fetch['key'], $fetch['actual_address']);
            return 'Please download the DOCX file <a href="' . url('api/file/get/' . $file_name . '/' . $type . '') . '">Download</a>';
        } else {
            return ' <h2 style="color:red">Access Denied</h2>';
        }
    }

    /**
     * Expect data from API
     * @return PDF
     */
    public function postPdfApi()
    {
        $fetch = json_decode(file_get_contents("php://input"), true);
        if($this->dataValidation($fetch) != false) {
            $data = $fetch['data'];
            $file_name = $fetch['as'];
            $type = $fetch['type'];
            //API key and API uses address send to customerCredential as parameter
            //API Token is reduce 1 per API request
            $this->customerCredential($fetch['key'], $fetch['actual_address']);
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($data);
            file_put_contents("pdf/".$file_name.".pdf", $pdf->output());
            return 'Please download the PDF file <a href="' . url('api/file/get/' . $file_name . '/' . $type . '') . '">Download</a>';
        } else {
            return ' <h2 style="color:red">Access Denied</h2>';
        }

    }

    /**
     * @return showing PDF
     */
    public function showPdfApi($data = null)
    {
        $fpdf = new Fpdf();
        $fpdf->AddPage();
        $fpdf->SetFont('Arial','B',16);
        $fpdf->Cell(40,10,'Hello World!');
        $fpdf->Output();
        exit;
    }

    /**
     * @param array $data | expect data
     * @param array $keys | expect array keys
     * @param null $file_name | expect name of the file
     * @return a template of Docx
     */
    public function getDocxTemplate($data = array(), $keys = array(), $file_name = null)
    {
        $phpword = new \PhpOffice\PhpWord\PhpWord;
        $section = $phpword->addSection();
        $header = $section->addFooter();
        $date = date("Y-m-d");
        $header->addText("Created on ".$date."");
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
        foreach($keys as $key) {
            $table->addCell(2000, $styleCell)->addText(ucfirst($key), $fontStyle);
        }

        // Add more rows / cells
        foreach($data as $rows) {
            $table->addRow();
            foreach($rows as $row) {
                $table->addCell(2000)->addText($row);
            }
        }
        // Save File
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpword, 'Word2007');
        $objWriter->save('docx/'.$file_name.'.docx');
    }
}
