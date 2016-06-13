<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CsvDataModel extends Model
{
    protected $table = 'csv_data';
    protected $fillable = [
            'appno',
            'tmappliedfor'
    ];
}
