<?php

namespace App\Http\Controllers\Admin;

use App\AdminMailBoxModel;
use App\CustomerRequestedTokenModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use DB;

/**
 * Interface dashboardTemplate
 * @package App\Http\Controllers\Admin
 */
interface dashboardTemplate
{
    public function getDashboard();
    public function getNewMailInfo();
    public function getCount($data);
    public function getNewTokenRequestInfo();
    public function getTotalCustomer();
}
class AdminDashboardController extends Controller implements dashboardTemplate
{
    public function getDashboard()
    {
        $data['data'] = array(
            'new_mail' => $this->getNewMailInfo(),
            'new_token_request' => $this->getNewTokenRequestInfo(),
            'total_customer'    => $this->getTotalCustomer()
        );
        return view('admin.include.dashboard', $data);
    }

    /**
     * @return New mail info
     */
    public function getNewMailInfo()
    {
        $data = AdminMailBoxModel::where('new_mail', 0)->get();
        return $this->getCount($data);
    }

    /**
     * @param $data
     * @return Count the array given
     */
    public function getCount($data)
    {
        $count = 0;
        foreach($data as $row) {
            $count++;
        }
        return $count;
    }

    /**
     * @return Total New Token request
     */
    public function getNewTokenRequestInfo()
    {
        $data = CustomerRequestedTokenModel::where('action', 0)->get();
        return $this->getCount($data);
    }

    /**
     * @return Total customer using this application
     */
    public function getTotalCustomer()
    {
        $data = DB::table('customer')->get();
        return $this->getCount($data);
    }
}
