<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teams_restrictions extends Model
{
    use HasFactory;

    protected $fillable = [
        'teams_id',
        'restriction_id'
       ];
}
