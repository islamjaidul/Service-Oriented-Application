<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerRequestedTokenModel extends Model
{
    protected $table = 'customer_token_request';
    protected $fillable = ['token_request', 'action', 'customerid'];
}
