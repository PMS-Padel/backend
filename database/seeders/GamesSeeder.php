<?php

namespace Database\Seeders;

use App\Models\Games;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Games::create([
        'Campo_id' =>  1,
        'start_at' => 1,
        'day'=> 1,
        'updated_at'=> '2023-01-04 10:57:13',
        'created_at'=> '2023-01-04 10:57:13',
        ]);
    }
}
