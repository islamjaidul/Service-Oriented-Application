<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminMailBoxModel extends Model
{
    protected $table = 'admin_message';
    protected $fillable = ['inbox_message', 'inbox_subject', 'sent_message', 'sent_subject', 'new_mail', 'customerid'];
}
