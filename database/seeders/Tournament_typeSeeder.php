<?php

namespace Database\Seeders;

use App\Models\Tournament_type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Tournament_typeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Tournament_type::create([
            'name' => 'Feminino',
        ]);
        Tournament_type::create([
            'name' => 'Masculino',
        ]);
        Tournament_type::create([
            'name' => 'Misto',
        ]);
    }
}
