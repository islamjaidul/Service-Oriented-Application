<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerMailBoxModel extends Model
{
    protected $table = 'customer_message';
    protected $fillable = ['inbox_message', 'inbox_subject', 'new_mail', 'sent_message', 'sent_subject', 'sent_mail', 'customerid'];
}
