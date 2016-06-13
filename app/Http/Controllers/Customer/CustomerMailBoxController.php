<?php

namespace App\Http\Controllers\Customer;

use App\AdminMailBoxModel;
use App\CustomerMailBoxModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Carbon\Carbon;

/**
@return Mail Box Interface as mailBoxTemplate
*/
interface mailBoxTemplate
{
    public function getCustomerMailBox();
    public function getCustomerId();
    public function getCustomerInbox();
    public function getCustomerMail();
    public function getCustomerCompose(Request $request);
    public function getCustomerNewMail();
}

class CustomerMailBoxController extends Controller implements mailBoxTemplate
{
    /**
     * @return Mail box page
     */
    public function getCustomerMailBox()
    {
        return view('customer.include.mail_box');
    }

    /**
     * @return Logged in customer id
     */
    public function getCustomerId()
    {
        return auth()->guard('customer')->user()->id;
    }

    /**
     * @param null $id | Expect mail id
     * @return Customer mail box information total or according to mail id if given
     */
    public function getCustomerInbox($id = null)
    {
    //Json Request comes from Controller.js for fetch all mail
        if($id == null)
            $customer_inbox = CustomerMailBoxModel::where('customerid', $this->getCustomerId())
                ->orderBy('id', 'desc')
                ->get();
        else
            $customer_inbox = CustomerMailBoxModel::where('customerid', $this->getCustomerId())->where('id', $id)->get();

        return $customer_inbox;
    }

    /**
     * @data is comes from by Ajax request from js/CustomerController.js
     * @return particular mail open for reading by customer by id
     */
    public function getCustomerMail()
    {
            $data = json_decode(file_get_contents('php://input'));
            $sql = CustomerMailBoxModel::find($data->id);
            $sql->new_mail = 1;     //new_mail = 1 means, it read
            $sql->save();
            return $this->getCustomerInbox($data->id);
    }

    /**
     * $data | Expect data by ajax post request
     * @return bool | Successfully Customer compose has done or not
     */
    public function getCustomerCompose(Request $request)
    {
        if($request->acceptsJson()) {
            $data = json_decode(file_get_contents("php://input"));
            AdminMailBoxModel::create(array(
                'inbox_subject' => $data->subject,
                'inbox_message' => $data->message,
                'new_mail'      => 0,
                'customerid'    => $this->getCustomerId()
            ));
            CustomerMailBoxModel::create(array(
                'sent_subject' => $data->subject,
                'sent_message' => $data->message,
                'sent_mail'    => 1,
                'customerid'   => $this->getCustomerId()
            ));
            return 'true';
        } else {
            return 'false';
        }
    }

    /**
     * @return total new mail;
     */
    public function getCustomerNewMail()
    {
        $total_new_mail = new CustomerDashboardController();
        $result = $total_new_mail->getCustomerNewMail();
        return $result;
    }
}
