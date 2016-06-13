<?php

namespace App\Http\Controllers\Admin;

use App\CustomerApiModel;
use App\CustomerRequestedTokenModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use DB;
/**
 * Interface tokenTemplate
 * @package App\Http\Controllers\Admin
 */
interface tokenTemplate
{
    public function getToken();
    public function getAction();
    public function getTokenInformation();
}

/**
 * Class AdminTokenController
 * @package App\Http\Controllers\Admin
 */
class AdminTokenController extends Controller implements tokenTemplate
{

    /**
     * @return Token Approval page
     */
    public function getToken()
    {
        return view('admin.include.token_panel');
    }

    /**
     * $data is comes by ajax request
     * Take action to approve the token request
     */
    public function getAction()
    {
        $data = json_decode(file_get_contents('php://input'));

        $token_request = DB::table('customer_token_request')
                            ->where('customerid', $data->id)
                            ->update(['action' => 1]);
        $customer_api = DB::table('customer_api')
                            ->where('customerid', $data->id)
                            ->update(['api_token' => $data->token_request, 'remaining_api_token' => $data->token_request]);

        return $this->getTokenInformation();
    }

    /**
     * Taken the necessary information of token
     */
    public function getTokenInformation()
    {
        $data = DB::table('customer')
                    ->join('customer_token_request', 'customer.id', '=', 'customer_token_request.customerid')
                    ->select('customer.id as customerid', 'customer.name', 'customer_token_request.*')
                    ->get();
        return $data;
    }
}
