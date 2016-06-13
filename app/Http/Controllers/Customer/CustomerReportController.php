<?php

namespace App\Http\Controllers\Customer;

use App\CustomerApiModel;
use App\CustomerApiUsesModel;
use App\CustomerRequestedTokenModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Barryvdh\DomPDF\PDF;
use App;

/**
@return Report Interface as reportTemplate
*/
interface reportTemplate
{
    public function getCustomerReport();
    public function customerID();
    public function getApiReport();
    public function getTokenReport();
    public function getTotalApprovedToken();
    public function getCustomerReportExport();
    
}

class CustomerReportController extends Controller implements reportTemplate
{
    /**
    @return customer report view with all information
    */
    public function getCustomerReport()
    {
        $api['api_report'] = $this->getApiReport();
        $token['token_report'] = $this->getTokenReport();
        $total_result['result'] = array($this->getTotalApprovedToken(), 10);
        $data['data'] = array(
                            'api_report'    => $this->getApiReport(),
                            'token_report'  => $this->getTokenReport(),
                            'result'        => array($this->getTotalApprovedToken(), 10)
                        );
        return view('customer.include.report', $data);
        //return $data['data'];
    }

    /**
    @return customer ID
    */
    public function customerID()
    {
        return auth()->guard('customer')->user()->id;
    }
    
    /**
    @return API report
    */
    public function getApiReport()
    {
        $api_report = CustomerApiUsesModel::where('customerid', $this->customerID())->get();
        return $api_report;
    }

    /**
    @return customer Token Report
    */
    public function getTokenReport()
    {
        $token_report = CustomerRequestedTokenModel::where('customerid', $this->customerID())->get();
        return $token_report;
    }

    /**
    @return customer total approval report | which customer approve or not | It included with the customer token report
    */
    public function getTotalApprovedToken()
    {
        $token = $this->getTokenReport();
        $approved_token = 0;
        foreach($token as $row) {
            if($row->action == 1) {
                $approved_token += $row->token_request;
            }
        }
        return $approved_token;
    }

    /**
    @return customer report export as PDF
    */
    public function getCustomerReportExport()
    {
        $api['api_report'] = $this->getApiReport();
        $token['token_report'] = $this->getTokenReport();
        $total_result['result'] = array($this->getTotalApprovedToken(), 10);
        $data['data'] = array(
            'api_report'    => $this->getApiReport(),
            'token_report'  => $this->getTokenReport(),
            'result'        => array($this->getTotalApprovedToken(), 10)
        );

        $view = view('customer.include.pdf_report_export', $data);
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream();
    }
}
