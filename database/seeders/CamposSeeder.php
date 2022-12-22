<?php

namespace Database\Seeders;

use App\Models\Court;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

    class CourtsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Court::create([
            'Disponibilidade' => 'Ocupado',
        ]);

        Court::create([
            'Disponibilidade' => 'Ocupado',
        ]);
    }
}
