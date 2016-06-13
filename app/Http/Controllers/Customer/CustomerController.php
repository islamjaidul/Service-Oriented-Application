<?php
namespace App\Http\Controllers\Customer;

use App\CustomerApiModel;
use App\CustomerModel;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Mail;
use DB;
class CustomerController extends Controller
{
    public function getRegister()
    {
        return view('auth.register');
    }

    /**
     * @param $to expect where the email will send
     * @param $subject email subject
     * @param $msg email message
     * @return bool
     */
    public function sendMail($to, $subject, $msg)
    {
       $headerFields = array(
        "From: KP System <noreply@kpsystem.se>",
        "MIME-Version: 1.0",
        "Content-Type: text/html;charset=utf-8"
       );
        $mail_sent = mail($to, $subject, $msg, implode("\r\n", $headerFields));
    }


    public function postRegister(Requests\CustomerRegisterRequest $request)
    {
       $token = str_random(60);
       $register = DB::table('customer')->insert(array(
           'name'               => $request->input('name'),
           'email'              => $request->input('email'),
           'password'           => bcrypt($request->input('password')),
           'activation_token'   => $token,
           'role'               => 'U',
           'active'             => 0
       ));

       if($register) {
           $data['name'] = $request->input('name');
           $data['token'] = $token;
           $msg = view('emails.verification', $data);
           $this->sendMail($request->input('email'), 'Account Activation', $msg); 
           return 'Mail has sent, please active your account';
        }
    }

    public function getActivation($token) {
        $activation = DB::table('customer')
            ->where('activation_token', $token)
            ->update(['activation_token' => '', 'active' => 1]);
        return "Your account has successfully activated. Please login";

    }

    /**
     * @return Customer Login Page
     */
    public function getLogin()
    {
        return view('auth.customer_login');
    }


    /**
     * @param Requests\CustomerLoginRequest $request
     * @return post login of the customer and intended to another route after login
     */
    public function postLogin(Requests\CustomerLoginRequest $request)
    {
        $customer = auth()->guard('customer');
        $check_for_activation = CustomerModel::where('email', $request->input('email'))->where('active', 1)->get();
        if(count($check_for_activation) != 0) {
            if($customer->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
                return redirect()->intended('/customer/dashboard');
            } else {
                return redirect('customer/login')->with('auth_invalid_message', 'Invalid Username \ Password');
            }
        } else {
            return redirect('customer/login')->with('auth_invalid_message', 'You are not activated, please active your account');
        }
    }

    /**
     * @return Customer panel logout
     */
    public function getLogOut()
    {
        auth()->guard('customer')->logout();
        return redirect('customer/login');
    }
}
