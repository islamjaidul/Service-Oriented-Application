<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('home.index');
});

Route::auth();
Route::get('/login', 'Auth\AuthController@getLogin');

Route::group(['middleware' => 'customer'], function() {

    //Customer Dashboard Route Start
    Route::get('/customer/dashboard', 'Customer\CustomerDashboardController@getCustomerDashboard');
    //Customer Dashboard Route End

    //Customer API Panel Route Start
    Route::get('/customer/api', 'Customer\CustomerApiController@getCustomerApi');
    Route::get('/customer/api-key/get', 'Customer\CustomerApiController@getCustomerApiKey');
    Route::post('/customer/api-key/generate', 'Customer\CustomerApiController@postCustomerApiKey');
    //Customer API Panel Route End

    //Customer Token Manger Route Start
    Route::get('/customer/token', 'Customer\CustomerTokenController@getCustomerToken');
    Route::get('/customer/token/get/approval', 'Customer\CustomerTokenController@getCheckForTokenApproval');
    Route::post('/customer/token/generate', 'Customer\CustomerTokenController@postCustomerNewToken');
    Route::get('/customer/token/remaining', 'Customer\CustomerTokenController@getRemainingToken');
    //Customer Token Manager Route End

    //Customer Mailbox Route Start
    Route::get('/customer/mailbox', 'Customer\CustomerMailBoxController@getCustomerMailbox');
    Route::get('/customer/mailbox/compose', 'Customer\CustomerMailBoxController@getCustomerCompose');
    Route::post('/customer/mailbox/compose', 'Customer\CustomerMailBoxController@postCustomerCompose');
    Route::get('/customer/mailbox/inbox', 'Customer\CustomerMailBoxController@getCustomerInbox');
    Route::post('/customer/mailbox/inbox/single', 'Customer\CustomerMailBoxController@getCustomerMail');
    Route::get('/customer/mailbox/sent', 'Customer\CustomerMailBoxController@getCustomerSent');
    Route::post('/customer/mailbox/compose', 'Customer\CustomerMailBoxController@getCustomerCompose');
    Route::get('/customer/mailbox/newmail', 'Customer\CustomerMailBoxController@getCustomerNewMail');
    /**
     * Get Inbox and Sent page by Jquery
     */
    Route::get('/customer/mailbox/request/inbox', 'Customer\CustomerMailBoxController@getCustomerInboxRequest');
    Route::get('/customer/mailbox/request/sent', 'Customer\CustomerMailBoxController@getCustomerSentRequest');
    //Customer Mailbox Route End

    //Customer Report Route Start
    Route::get('/customer/report', 'Customer\CustomerReportController@getCustomerReport');
    Route::get('/customer/report/export', 'Customer\CustomerReportController@getCustomerReportExport');
    //Customer Report Route End

    //Customer Documentation Start
    Route::get('/customer/documentation', 'Customer\CustomerDocumentationController@getDocumentation');
    //Customer Documentation End

});

//Customer Authentication Start
Route::get('customer/register', 'Customer\CustomerController@getRegister');
Route::group(['middleware' => 'Illuminate\Foundation\Http\Middleware\VerifyCsrfToken'], function() {
    Route::post('customer/register', 'Customer\CustomerController@postRegister');
});
Route::get('customer/register/activation/{id}', 'Customer\CustomerController@getActivation');
Route::get('customer/login', 'Customer\CustomerController@getLogin');
Route::post('customer/login',  'Customer\CustomerController@postLogin');
Route::get('customer/logout', 'Customer\CustomerController@getLogout');
//Customer Authentication End

//Api Route Start
Route::get('api/file/get/{name}/{type}', 'API\RestApiController@getFile');
Route::post('api/csv', 'API\RestApiController@postCsvApi');
Route::post('api/docx', 'API\RestApiController@postDocxApi');
Route::post('api/pdf', 'API\RestApiController@postPdfApi');
Route::get('api/show/pdf', 'API\RestApiController@showPdfApi');
Route::get('api/get/remaining_token', 'API\RestApiController@tokenHandler');

//Api Route End

Route::get('/home', 'HomeController@index');
Route::get('/dashboard/pdf/export', 'CsvController@getPdfExport');
//Admin Area Start
Route::group(['middleware' => 'auth'], function() {
    Route::get('admin/dashboard', 'Admin\AdminDashboardController@getDashboard');
    //Customer Panel Start
    Route::get('admin/customer', 'Admin\AdminCustomerController@getCustomer');
    Route::get('admin/customer/info', 'Admin\AdminCustomerController@getInformation');
    Route::post('admin/customer/action', 'Admin\AdminCustomerController@getAction');
    Route::post('admin/customer/view', 'Admin\AdminCustomerController@getView');
    //Customer Panel End

    //Token Panel Start
    Route::get('admin/token', 'Admin\AdminTokenController@getToken');
    Route::get('admin/token/info', 'Admin\AdminTokenController@getTokenInformation');
    Route::post('admin/token/action', 'Admin\AdminTokenController@getAction');
    //Token Panel End

    //Mailbox Start
    Route::get('admin/mailbox', 'Admin\AdminMailBoxController@getMailBox');
    Route::get('admin/mailbox/inbox', 'Admin\AdminMailBoxController@getMailBoxInbox');
    Route::post('admin/mailbox/inbox/single', 'Admin\AdminMailBoxController@getOpenMailBox');
    Route::post('admin/mailbox/replay', 'Admin\AdminMailBoxController@getReplayMail');
    Route::get('admin/mailbox/newmail', 'Admin\AdminMailBoxController@getNewMail');
    //Mailbox End
});
//Admin Area End


