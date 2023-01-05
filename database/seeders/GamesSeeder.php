<?php

namespace Database\Seeders;

use App\Models\Games;
use Carbon\Carbon;
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
            'campo_id' => 1,
            'tourney_id' => 4,
            'start_at' => Carbon::now()->subDays(58)->hour(17)->minute(00)->second(00),
            'updated_at' => Carbon::now()->subDays(65),
            'created_at' => Carbon::now()->subDays(65),
            'team_id1' => 9,
            'team_id2' => 6,
            'team1_points' => 1,
            'team2_points' => 3,
            'winner_id' => 6,
        ]);
        Games::create([
            'campo_id' => 2,
            'tourney_id' => 4,
            'start_at' => Carbon::now()->subDays(58)->hour(18)->minute(00)->second(00),
            'updated_at' => Carbon::now()->subDays(64),
            'created_at' => Carbon::now()->subDays(64),
            'team_id1' => 5,
            'team_id2' => 9,
            'team1_points' => 3,
            'team2_points' => 2,
            'winner_id' => 5,
        ]);
        Games::create([
            'campo_id' => 1,
            'tourney_id' => 4,
            'start_at' => Carbon::now()->subDays(54)->hour(15)->minute(00)->second(00),
            'updated_at' => Carbon::now()->subDays(60),
            'created_at' => Carbon::now()->subDays(60),
            'team_id1' => 6,
            'team_id2' => 5,
            'team1_points' => 3,
            'team2_points' => 2,
            'winner_id' => 6,
        ]);
    }
}
