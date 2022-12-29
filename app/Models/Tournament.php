<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'init_date',
        'end_date',
        'location',
        'price',
        'max_players',
        'tournament_type_id',
        'userid',
        'file_url',
    ];
}
