<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Games extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'tourney_id',
        'campo_id',
        'start_at',
        'team_id1',
        'team_id2',
        'team1_points',
        'team2_points',
        'winner_id',

        
       ];
}