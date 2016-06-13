<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserPanelRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'      => 'required|max:20',
            'email'     => 'required|max:30',
            'password'  => 'required|min:8|confirmed'
        ];
    }
}
