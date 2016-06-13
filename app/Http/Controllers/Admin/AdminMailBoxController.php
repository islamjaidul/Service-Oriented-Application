<?php

namespace App\Http\Controllers\Admin;

use App\AdminMailBoxModel;
use App\CustomerMailBoxModel;
use App\CustomerModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use DB;
/**
 * Interface mailBoxTemplate
 * @package App\Http\Controllers\Admin
 */
interface mailBoxTemplate
{
    public function getMailBox();
    public function getMailBoxInbox();
    public function getOpenMailBox();
    public function getReplayMail();
    public function getNewMail();
}

class AdminMailBoxController extends Controller implements mailBoxTemplate
{
    /**
     * @return MailBox page
     */
    public function getMailBox()
    {
        return view('admin.include.mail_box');
    }

    /**
     * @return Inbox with all information
     */
    public function getMailBoxInbox()
    {
        $data = DB::table('admin_message')
                    ->join('customer', 'customer.id', '=', 'admin_message.customerid')
                    ->select('customer.name as customer_name','admin_message.id', 'admin_message.inbox_subject', 'admin_message.new_mail', 'admin_message.created_at')
                    ->get();
        return $data;
    }

    /**
     * Expect id by ajax request from AdminController.js
     * @return Selected mail information by the mail id
     */
    public function getOpenMailBox()
    {
        $data = json_decode(file_get_contents('php://input'));
        $sql = DB::table('admin_message')
                    ->select('admin_message.id', 'admin_message.customerid','admin_message.inbox_message', 'admin_message.inbox_subject')
                    ->where('id', $data->id)
                    ->get();
        return $sql;
    }


    /**
     * Parameter expect by Ajax
     * @return Repaly Mail to Customer
     */
    public function getReplayMail()
    {
        $data = json_decode(file_get_contents('php://input'));
        $sql = CustomerMailBoxModel::create(array(
           'inbox_subject'  => 'Replay - '.$data->subject,
            'inbox_message' => $data->message,
            'new_mail'      => 0,
            'customerid'    => $data->customerid
        ));
        return 'done';
    }

    /**
     * @return New Mail info
     */
    public function getNewMail()
    {
        $new_mail = new AdminDashboardController();
        return $new_mail->getNewMailInfo();
    }
}
