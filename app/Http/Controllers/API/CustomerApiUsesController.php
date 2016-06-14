<?php

namespace App\Http\Controllers\API;

use App\CustomerAddressCount;
use App\CustomerAddressModel;
use App\CustomerApiModel;
use App\CustomerApiUsesModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class CustomerApiUsesController extends Controller
{
    /**
     * @param $api_key | Expect API Key
     * @return Customer Id
     */
    public function getCustomerId($api_key)
    {
        $customer_id = CustomerApiModel::where('api_key', $api_key)->get();
        $id = null;
        foreach($customer_id as $row) {
            $id = $row->customerid;
        }
        return $id;
    }

    /**
     * @param $api_key | Expect API key
     * @param $website_address | Expect API uses website address
     * @return new website address or update website address if exist and count it how many times it uses
     */
    public function getApiUsesWebsiteInfo($api_key, $website_address)
    {
        $customer_id = $this->getCustomerId($api_key);
        if($this->checkRowOfUsesAddress($website_address, $customer_id) == true) {
            CustomerApiUsesModel::create(array(
                'uses_address' => $website_address,
                'api_uses_count' => 1,
                'customerid'   => $customer_id
            ));
        } else {
            $update = CustomerApiUsesModel::where('uses_address', $website_address)->where('customerid', $customer_id)->get();
            foreach($update as $update) {
                $update->api_uses_count += 1;
                $update->save();
                break;
            }
        }
    }


    /**
     * @param $website_address | Expect API uses web address
     * @param $customer_id | Expect Customer id of API key
     * @return check the website address exist or not of the particular customer
     */
    public function checkRowOfUsesAddress($website_address, $customer_id)
    {
        $check = CustomerApiUsesModel::where('uses_address', $website_address)->where('customerid', $customer_id)->get();
        if(count($check) == 0) {
            return true;
        } else {
            return false;
        }
    }
}
