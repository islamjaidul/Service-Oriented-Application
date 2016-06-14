<?php

namespace App\Http\Controllers\Customer;

use App\CustomerApiModel;
use App\CustomerRequestedTokenModel;
use App\Http\Controllers\ApiUsesWebsiteController;
use App\Http\Controllers\CustomerApiUsesController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use DB;

/**
@return Token Template Interface as tokenTemplate
*/
interface tokenTemplate
{
    public function getCustomerToken();
    public function getCustomerID();
    public function postCustomerNewToken();
    public function getCheckForTokenApproval();
    public function getTotalToken();
    public function getRemainingToken();
    public function updateUsesToken($key);
    
}

class CustomerTokenController extends Controller implements tokenTemplate
{

    /**
     * @return the view of Customer token with available token and remaining token
     */
    public function getCustomerToken()
    {   
        $data['token'] = $this->getTotalToken();
        return view('customer.include.token', $data);
    }

    /**
     * @return Logged in customer ID
     */
    public function getCustomerID()
    {
        $customer_id = auth()->guard('customer')->user()->id;
        return $customer_id;
    }

    /**
     * @return Customer requested new token
     */
    public function postCustomerNewToken()
    {
        $data = json_decode(file_get_contents('php://input'));
        CustomerRequestedTokenModel::create(array(
            'token_request'     => $data->new_token,
            'action'            => 0,
            'customerid'        => $this->getCustomerID()
        ));
        return 'done';
    }

    /**
     * @check requested customer token approve or not
     * @return approval result | 0 for not approve and 1 for approve by Admin
     */
    public function getCheckForTokenApproval()
    {
        $action = 0;
        $check = DB::table("customer_token_request")->where('customerid', $this->getCustomerID())->where('action', $action)->get();
        if(count($check) != 0) {
            foreach($check as $row) {
                $action = $row->action;
            }
            return $action;
        }
    }

    /**
     * @return Customer total token
     */
    public function getTotalToken()
    {
        $data = CustomerApiModel::where('customerid', $this->getCustomerID())->get();
        return $data;
    }

    /**
     * @return remaining token in database.
     */
    public function getRemainingToken()
    {
    	$id = $this->getCustomerID();
        $data = CustomerApiModel::all();
        //If no any API generated then the $remaining_token = 'no record'
        //It shows the the button disabled
        $remaining_token = 'no record';
        foreach($data as $row) {
            if($row->customerid == $id) {
                $remaining_token = $row->remaining_api_token;
            }
        }
        return $remaining_token;
    }

    /**
     * @param $key | Expect API key
     * @return subtraction for per API uses and Update the data to database
     */
    public function updateUsesToken($key)
    {
        $update = DB::table('customer_api')->where('api_key', $key)->get();
        $id = null;
        //Find the the ID of for the key
        foreach($update as $row) {
            $id = $row->id;
        }
        //Find the ID
        $update = CustomerApiModel::find($id);
        $uses_api_token = 1;

        //If there are remaining token then subtract from remaining token in database table
        $subtraction = $update->remaining_api_token - $uses_api_token;

        $update->remaining_api_token = $subtraction;
        $update->save();

    }

}
