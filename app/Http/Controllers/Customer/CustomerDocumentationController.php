<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class CustomerDocumentationController extends Controller
{
    public function getDocumentation()
    {
        return view('customer.include.documentation');
    }
}
