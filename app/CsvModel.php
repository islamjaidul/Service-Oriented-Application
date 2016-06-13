<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CsvModel extends Model
{
    protected $table = 'test';
    protected $fillable = [
        'Code_commune_INSEE',
        'Nom_commune',
        'Code_postal',
        'Libelle_acheminement',
        'Ligne_5'
    ];
}
