<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campos extends Model
{
    use HasFactory;

    protected $fillable = [
        'Campo_id',
        'start_at',
        'team_id1',
        'team_id2',
        //'Availability', ?
        
       ];
}