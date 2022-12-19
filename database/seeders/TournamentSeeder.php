<?php

namespace Database\Seeders;

use App\Models\Tournament;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TournamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tournament::create([
            'name' => 'primeiro',
            'init_date' => Carbon::now()->subDays(5),
            'end_date' => Carbon::now(),
            'max_players' => 10,
            'tournament_type_id' => 3,
        ]);
    }
}
