<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerApiModel extends Model
{
    protected $table = 'customer_api';
    protected $fillable = ['api_token', 'remaining_api_token', 'api_key', 'customerid'];
}
