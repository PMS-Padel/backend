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
            'name' => 'Diogo Barros',
            'email' => 'diobarr1989@gmail.com',
            'password' => Hash::make('123ABCabc?'),
            'user_code' => '123456',
            'gender' => 'M',
            'role'=> 'player',
            'level' => 3,
            'phone_number' => null,
            'birth_date' => null,
        ]);
        User::create([
            'name' => 'Pedro Velosa',
            'email' => 'pedro-gomes12@gmail.com',
            'password' => Hash::make('123ABCabc?'),
            'user_code' => '123457',
            'gender' => 'M',
            'role'=> 'player',
            'level' => 2,
            'phone_number' => null,
            'birth_date' => null,
        ]);
        User::create([
            'name' => 'Lara Sousa',
            'email' => 'sousagouveia@hotmail.com',
            'password' => Hash::make('123ABCabc?'),
            'user_code' => '123458',
            'gender' => 'F',
            'role'=> 'player',
            'level' => 3,
            'phone_number' => null,
            'birth_date' => null,
        ]);
        User::create([
            'name' => 'Maria Sousa',
            'email' => 'mariasga94@hotmail.com',
            'password' => Hash::make('123ABCabc?'),
            'user_code' => '123459',
            'gender' => 'F',
            'role'=> 'player',
            'level' => 2,
            'phone_number' => null,
            'birth_date' => null,
        ]);
        User::create([
            'name' => 'Sandro Mendes',
            'email' => 'sanmensa1@hotmail.com',
            'password' => Hash::make('123ABCabc?'),
            'user_code' => '123460',
            'gender' => 'M',
            'role'=> 'player',
            'level' => 4,
            'phone_number' => null,
            'birth_date' => null,
        ]);
        User::create([
            'name' => 'Daniela Câmara',
            'email' => 'dfhs1986@hotmail.com',
            'password' => Hash::make('123ABCabc?'),
            'user_code' => '123461',
            'gender' => 'F',
            'role'=> 'player',
            'level' => null,
            'phone_number' => 912148190,
            'birth_date' => null,
        ]);
        User::create([
            'name' => 'António Mata',
            'email' => 'antomato@hotmail.com',
            'password' => Hash::make('123ABCabc?'),
            'user_code' => '123462',
            'gender' => 'M',
            'role'=> 'player',
            'level' => null,
            'phone_number' => null,
            'birth_date' => null,
        ]);

        User::create([
            'name' => 'Cristiano Santos',
            'email' => 'cristsantos72@hotmail.com',
            'password' => Hash::make('123ABCabc?'),
            'user_code' => '123463',
            'gender' => 'M',
            'role'=> 'admin',
            'level' => 2,
            'phone_number' => 912663014,
            'birth_date' => null,
        ]);
        User::create([
            'name' => 'João Gouveia',
            'email' => 'jonajfg@hotmail.com',
            'password' => Hash::make('123ABCabc?'),
            'user_code' => '123464',
            'gender' => 'M',
            'role'=> 'admin',
            'level' => null,
            'phone_number' => null,
            'birth_date' => null,
        ]);
        User::create([
            'name' => 'Diana Sá',
            'email' => 'dinasanteiro192@hotmail.com',
            'password' => Hash::make('123ABCabc?'),
            'user_code' => '123465',
            'gender' => 'F',
            'role'=> 'admin',
            'level' => null,
            'phone_number' => null,
            'birth_date' => '1999-07-19',
        ]);

        User::create([
            'name' => 'Vítor Almeida',
            'email' => 'vitalmeida@gmail.com',
            'password' => Hash::make('123ABCabc?'),
            'user_code' => '123470',
            'gender' => 'M',
            'role'=> 'player',
            'level' => 2,
            'phone_number' => null,
            'birth_date' => null,
        ]);
        User::create([
            'name' => 'Fabiana Brita',
            'email' => 'fabirita@gmail.com',
            'password' => Hash::make('123ABCabc?'),
            'user_code' => '123471',
            'gender' => 'F',
            'role'=> 'player',
            'level' => 2,
            'phone_number' => null,
            'birth_date' => null,
        ]);
    }
}
