<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\CustomerModel;
use DB;
/**
 * Interface customerTemplate
 * @package App\Http\Controllers\Admin
 */
interface customerTemplate
{
    public function getCustomer();
    public function getInformation();
    public function getAction();
    public function getView();
}


class AdminCustomerController extends Controller implements customerTemplate
{
    /**
     * @return Customer view page
     */
    public function getCustomer()
    {
        return view('admin.include.customer_panel');
    }

    /**
     * @return get all information of a customer
     */
    public function getInformation()
    {
        $data = CustomerModel::all();
        return $data;
    }

    /**
     * @data | Expect customer id by ajax request
     * @return Action for doing active or block customer account
     */
    public function getAction()
    {
        $data = json_decode(file_get_contents('php://input'));
        $sql = CustomerModel::find($data->id);
        if($sql->active == 0) {
            $sql->active = 1;
        } else {
            $sql->active = 0;
        }
        $sql->save();
        return $this->getInformation();
    }

    /**
     * @param id | Expect by ajax request
     * @return customer information belong to customer and customer_api table
     */
    public function getView()
    {
        $data = json_decode(file_get_contents('php://input'));
        $sql = DB::table('customer')
                        ->join('customer_api', 'customer.id', '=', 'customer_api.customerid')
                        ->select('customer.id as customerid','customer.name as customername', 'customer.email as customeremail', 'customer.active as customeractive',  'customer_api.api_token', 'customer_api.remaining_api_token')
                        ->where('customerid', $data->id)
                        ->get();
         return $sql;
    }


}
