<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class UserPanelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getUserPanel()
    {
        return view('admin.include.user_panel');
    }

    public function postUserPanel(Requests\UserPanelRequest $requests)
    {
        return 'passed';
    }
}
