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
            'name' => 'Femeninos',
        ]);
        Tournament_type::create([
            'name' => 'Masculinos',
        ]);
        Tournament_type::create([
            'name' => 'Mistos',
        ]);
    }
}
