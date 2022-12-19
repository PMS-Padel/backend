<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'subscription_date',
        'player1_id',
        'player2_id',
        'payed'
    ];
    public function players() 
    {
        return $this->hasMany(User::class);
    }
}
