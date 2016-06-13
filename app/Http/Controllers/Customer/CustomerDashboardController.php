<?php

namespace App\Http\Controllers\Customer;

use App\CustomerApiModel;
use App\CustomerMailBoxModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

/**
@return Dashboard Interface as dashboardTemplate
*/
interface dashboardTemplate
{
    public function getCustomerDashboard();
    public function customerID();
    public function getCustomerNewMail();
    public function getCustomerRemainingToken();
    
}

class CustomerDashboardController extends Controller implements dashboardTemplate
{

    /**
     * @return Customer Dashboard Information
     */
    public function getCustomerDashboard()
    {
        $data['data'] = array(
            'new_mail'          => $this->getCustomerNewMail(),
            'remaining_token'   => $this->getCustomerRemainingToken()
        );
        return view('customer.include.dashboard', $data);
    }

    /**
     * @return Customer id
     */
    public function customerID()
    {
        return auth()->guard('customer')->user()->id;
    }

    /**
     * @return Customer New Mail
     */
    public function getCustomerNewMail()
    {
        $data = CustomerMailBoxModel::where('customerid', $this->customerID())->get();
        $new_mail = 0;
        foreach($data as $row) {
            if($row->new_mail == 0 && $row->sent_mail == 0) {
                ++$new_mail;
            }
        }
        return $new_mail;
    }

    /**
     * @return Customer remaining token
     */
    public function getCustomerRemainingToken()
    {
        $data = CustomerApiModel::where('customerid', $this->customerID())->get();
        $remaining_token = 0;
        foreach($data as $row) {
            $remaining_token = $row->remaining_api_token;
            break;
        }
        return $remaining_token;
    }
}
