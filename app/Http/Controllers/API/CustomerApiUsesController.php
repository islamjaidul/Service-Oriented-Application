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
        $customer_id = CustomerApiModel::all()->where('api_key', $api_key);
        $id = null;
        foreach($customer_id as $row) {
            $id = $row->customerid;
        }
        return $id;
    }

    /**
     * @param $api_key | Expect API key
     * @param $website_address | Expect API uses website address
     * @return void
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
            $update = CustomerApiUsesModel::all()->where('uses_address', $website_address);
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
     * @return bool
     */
    public function checkRowOfUsesAddress($website_address, $customer_id)
    {
        $check = CustomerApiUsesModel::all()->where('uses_address', $website_address)->where('customerid', $customer_id);
        if(count($check) == 0) {
            return true;
        } else {
            return false;
        }
    }
}
