<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campos extends Model
{
    use HasFactory;

    protected $fillable = [
        'Campo_id',
        'Hora_id',
        'Dia_id',
        //'Availability', ?
        
       ];
}