<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bmodel extends Model
{
    protected $table = 'beneficiaire';
    protected $fillable = [
        'nom',
        'prenom',
        'adresse',
        'telephone',
        'email',
        'type_beneficiaire'
    ];
}
