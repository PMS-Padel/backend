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
            'name' => 'Torneio Internacional Padel Funchal',
            'init_date' => Carbon::now()->addDays(7),
            'end_date' => Carbon::now()->addDays(26),
            'max_players' => 10,
            'tournament_type_id' => 2,
            'seguro' => null,
            'user_id'=> 9,
            'file_url'=>'https://www02.madeira-edu.pt/Portals/3/Images/Noticias/desporto_torneiopadel.jpg',
            'location'=>'Zona do Lido, Funchal, Madeira',
            'description' => null,
            'price' => 0,
        ]);
        Tournament::create([
            'name' => 'Torneio de Padel Camacha',
            'init_date' => Carbon::now()->subDays(1),
            'end_date' => Carbon::now()->addDays(7),
            'max_players' => 10,
            'tournament_type_id' => 2,
            'seguro' => 'Seguro ITRACK',
            'user_id'=> 13,
            'file_url'=>'https://jfcamacha.pt/images/autarquia/noticias/29/imagem_29.jpeg',
            'location'=>'Padel Centro Caniço',
            'description' => 'A Junta de Freguesia da Camacha irá promover a realização do I Torneio de Padel da Camacha, a ter lugar no Padel Centro Caniço.',
            'price' => 30.00,
        ]);
        Tournament::create([
            'name' => 'Torneio Social CPL #2',
            'init_date' => Carbon::now()->subDays(5),
            'end_date' => Carbon::now()->addDays(15),
            'max_players' => 10,
            'tournament_type_id' => 3,
            'seguro' => null,
            'user_id' => 13,
            'file_url'=>'https://www.aircourts.com/uploads/sites/padel22.jpg',
            'location'=>'Padel Centro Caniço',
            'description' => 'Ainda por definir',
            'price' => 0,
        ]);
        Tournament::create([
            'name' => 'Atlântico Padel Tour 2022',
            'init_date' => Carbon::now()->subDays(80),
            'end_date' => Carbon::now()->subDays(51),
            'max_players' => 10,
            'tournament_type_id' => 3,
            'seguro' => null,
            'user_id'=> 13,
            'file_url'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRF606zbPyQiWk2DlefdhOPVU6FX8C5PO8V4Rg4DDWWGmuxOHH11cCzUf97UsO-sSyvMj4&usqp=CAU',
            'location'=>'Jardins Panorâmicos, Madeira',
            'description' => null,
            'price' => 0,
        ]);

    }
}
