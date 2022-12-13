<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournaments_restrictions extends Model
{
    use HasFactory;

    protected $fillable = [
        'tournament_id',
        'restriction_id'
    ];
}
