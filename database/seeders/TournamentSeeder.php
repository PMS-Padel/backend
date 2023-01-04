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
            'end_date' => Carbon::now()->subDays(20),
            'max_players' => 10,
            'tournament_type_id' => 2,
            'seguro' => 'Atual',
            'user_id'=> 3,
            'file_url'=>'https://www02.madeira-edu.pt/Portals/3/Images/Noticias/desporto_torneiopadel.jpg',
            'location'=>'localidade1',
        ]);
        Tournament::create([
            'name' => 'segundo',
            'init_date' => Carbon::now()->subDays(-1),
            'end_date' => Carbon::now()->subDays(7),
            'max_players' => 10,
            'tournament_type_id' => 2,
            'seguro' => 'Atual',
            'user_id'=> 3,
            'file_url'=>'https://www02.madeira-edu.pt/Portals/3/Images/Noticias/desporto_torneiopadel.jpg',
            'location'=>'localidade1',
        ]);
        Tournament::create([
            'name' => 'terceiro',
            'init_date' => Carbon::now()->subDays(-20),
            'end_date' => Carbon::now()->subDays(-5),
            'max_players' => 10,
            'tournament_type_id' => 2,
            'seguro' => 'Atual',
            'user_id'=> 3,
            'file_url'=>'https://www02.madeira-edu.pt/Portals/3/Images/Noticias/desporto_torneiopadel.jpg',
            'location'=>'localidade1',
        ]);

    }
}
