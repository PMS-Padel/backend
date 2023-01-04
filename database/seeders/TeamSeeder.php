<?php

namespace Database\Seeders;


use App\Models\Team;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Team::create([
            'name' => 'Equipa1',
            'subscription_date' => Carbon::now()->subDays(10),
            'player1_id' => 1,
            'player2_id' => 3,
            'tournament_id' => 3,
            'payed' => "true",
        ]);
        Team::create([
            'name' => 'Equipa2',
            'subscription_date' => Carbon::now()->subDays(9),
            'player1_id' => 2,
            'player2_id' => 4,
            'tournament_id' => 3,
            'payed' => "true",
        ]);
        Team::create([
            'name' => 'Equipa3',
            'subscription_date' => Carbon::now()->subDays(7),
            'player1_id' => 5,
            'player2_id' => 6,
            'tournament_id' => 3,
            'payed' => "true",
        ]);
        Team::create([
            'name' => 'Equipa4',
            'subscription_date' => Carbon::now()->subDays(6),
            'player1_id' => 10,
            'player2_id' => 8,
            'tournament_id' => 3,
            'payed' => "true",
        ]);

        //TORNEIO ID 4
        Team::create([
            'name' => 'Equipa1',
            'subscription_date' => Carbon::now()->subDays(90),
            'player1_id' => 1,
            'player2_id' => 3,
            'tournament_id' => 4,
            'payed' => "true",
        ]);
        Team::create([
            'name' => 'Equipa2',
            'subscription_date' => Carbon::now()->subDays(83),
            'player1_id' => 2,
            'player2_id' => 4,
            'tournament_id' => 4,
            'payed' => "true",
        ]);
        Team::create([
            'name' => 'Equipa3',
            'subscription_date' => Carbon::now()->subDays(83),
            'player1_id' => 5,
            'player2_id' => 6,
            'tournament_id' => 4,
            'payed' => "true",
        ]);
        Team::create([
            'name' => 'Equipa4',
            'subscription_date' => Carbon::now()->subDays(81),
            'player1_id' => 10,
            'player2_id' => 8,
            'tournament_id' => 4,
            'payed' => "true",
        ]);
        Team::create([
            'name' => 'Equipa5',
            'subscription_date' => Carbon::now()->subDays(81),
            'player1_id' => 11,
            'player2_id' => 12,
            'tournament_id' => 4,
            'payed' => "true",
        ]);
    }
}

