<?php

namespace Database\Seeders;


use App\Models\Teams_restrictions;
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
        Teams_restrictions::create([
            'teams_id' => 1,
            'restriction_id' => 1,
        ]);
    }
}
