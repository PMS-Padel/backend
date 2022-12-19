<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => Hash::make('123'),
            'user_code' => '123456',
            'gender' => 'M',
            'role'=> 'player'
        ]);
        User::create([
            'name' => 'John Doe2',
            'email' => 'johndoe2@example.com',
            'password' => Hash::make('123'),
            'user_code' => '223456',
            'gender' => 'M',
            'role'=> 'player'
        ]);
        User::create([
            'name' => 'John Doe3',
            'email' => 'johndoe3@example.com',
            'password' => Hash::make('123'),
            'user_code' => '323456',
            'gender' => 'M',
            'role'=> 'player'
        ]);
        //User::factory(5)->create();
    }
}
