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
            'role'=> 'admin'
        ]);
        User::create([
            'name' => 'John Doe4',
            'email' => 'johndoe4@example.com',
            'password' => Hash::make('123'),
            'user_code' => '323454',
            'gender' => 'M',
            'role'=> 'admin'
        ]);

        User::create([
            'name' => 'John Doe5',
            'email' => 'johndoe5@example.com',
            'password' => Hash::make('123'),
            'user_code' => '223457',
            'gender' => 'M',
            'role'=> 'player'
        ]);

        User::create([
            'name' => 'John Doe6',
            'email' => 'johndoe6@example.com',
            'password' => Hash::make('123'),
            'user_code' => '223458',
            'gender' => 'F',
            'role'=> 'player'
        ]);

        User::create([
            'name' => 'John Doe7',
            'email' => 'johndoe7@example.com',
            'password' => Hash::make('123'),
            'user_code' => '223459',
            'gender' => 'O',
            'role'=> 'player'
        ]);


        //User::factory(5)->create();
    }
}
