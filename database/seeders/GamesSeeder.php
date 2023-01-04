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
        'campo_id' =>  1,
        'tourney_id'=>2,
        'start_at' => '2023-04-03 02:30:30',
        'updated_at'=> '2023-01-04 10:57:13',
        'created_at'=> '2023-01-04 10:57:13',
        'team_id1'=> 3,
        'team_id2'=> 4,
    

        ]);
    }
}
