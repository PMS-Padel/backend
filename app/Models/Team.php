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
        'payed',
        'player1_id',
        'player2_id',
        
       ];

    public function players() 
    {
        return $this->hasMany(User::class);
    }
}
