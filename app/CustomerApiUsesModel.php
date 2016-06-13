<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerApiUsesModel extends Model
{
    protected $table = 'api_uses_address';
    protected $fillable = ['uses_address', 'api_uses_count', 'customerid'];
}
