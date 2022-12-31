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
            'name' => 'Nome Equipa',
            'subscription_date' => Carbon::now(),
            'player1_id' => 1,
            'player2_id' => 2,
            'tournament_id' => 3,
            'payed' => "Pagamento",

        ]);
    }
}

