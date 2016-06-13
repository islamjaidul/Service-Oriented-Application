<?php

namespace App\Http\Controllers\Customer;

use App\CustomerApiModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

/**
@return API Interface as apiTemplate
*/
interface apiTemplate
{
    public function getCustomerApi();
    public function getCustomerApiKey();
    public function postCustomerApiKey();
}

class CustomerApiController extends Controller implements apiTemplate
{
    /**
     * @return the customer API page
     */
    public function getCustomerApi()
    {
        return view('customer.include.api');
    }

    /**
     * @return customer API loading in the page by ajax request
     */
    public function getCustomerApiKey()
    {
        $customer_id = auth()->guard('customer')->user()->id;
        $data = CustomerApiModel::where('customerid', $customer_id)->get();
        return $data;
    }

    /**
     * @return create an API and create the data for first time to use the API
     */
    public function postCustomerApiKey()
    {
        $api_key = str_random(60);
        $customer_id = auth()->guard('customer')->user()->id;
        CustomerApiModel::create(array(
            'api_token' => 10,      //Default Token given
            'remaining_api_token' => 10,    //Default Remaining Token
            'api_key'   => $api_key,
            'customerid'   => $customer_id
        ));

        $data = CustomerApiModel::where('customerid', $customer_id)->get();
        return $data;
    }
}

