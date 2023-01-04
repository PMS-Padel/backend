<?php

namespace Database\Seeders;

use App\Models\Court;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Court::create([
            'name' => 'Grupo São Roque',
        ]);

        Court::create([
            'name' => 'Alberto Oculista',
        ]);
    }
}
