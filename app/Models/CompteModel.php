<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompteModel extends Model
{
    
    use HasFactory;
    protected $table = 'compt';
    protected $fillable=['num_compt','type_compt','sold','date_creation','description'];
    protected $casts = [
        'date_creation' => 'datetime',
    ];
}
