<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class CustomerModel extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'customer';
    protected $fillable = [
        'name', 'email', 'password', 'role', 'active'
    ];
}
