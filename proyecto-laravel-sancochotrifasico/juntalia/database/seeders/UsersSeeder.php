<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            // Usuario 1
            [
                'name' => 'John',
                'last_name' => 'Doe',
                'email' => 'john.doe@example.com',
                'password' => bcrypt('1234'),
                'phone' => '123456789',
                'birth_date' => '1990-01-01',
                'rol_id' => 2
            ],
            // Usuario 2
            [
                'name' => 'Jane',
                'last_name' => 'Smith',
                'email' => 'jane.smith@example.com',
                'password' => bcrypt('1234'),
                'phone' => '987654321',
                'birth_date' => '1992-02-02',
                'rol_id' => 2
            ],
            // Usuario 3
            [
                'name' => 'Gaby',
                'last_name' => 'Frank',
                'email' => 'gaby.frank@example.com',
                'password' => bcrypt('1243'),
                'phone' => '12345678',
                'birth_date' => '1995-05-08',
                'rol_id' => 1
            ],
            // Usuario 4
            [
                'name' => 'David',
                'last_name' => 'Spatia',
                'email' => 'david.espt@gmail.com',
                'password' => bcrypt('1243'),
                'phone' => '12345678',
                'birth_date' => '1994-04-03',
                'rol_id' => 1
            ],
            // Usuario 5
            [
                'name' => 'Cris',
                'last_name' => 'Sands',
                'email' => 'cris.sands@gmail.com',
                'password' => bcrypt('1243'),
                'phone' => '31047852',
                'birth_date' => '1999-09-08',
                'rol_id' => 1
            ],
            // Usuario 6
            [
                'name' => 'Angelica',
                'last_name' => 'Casta',
                'email' => 'ange.casta@example.com',
                'password' => bcrypt('8547'),
                'phone' => '77124639',
                'birth_date' => '1998-08-09',
                'rol_id' => 2
            ],
            // Usuario 7
            [
                'name' => 'Laura',
                'last_name' => 'Blacksmith',
                'email' => 'laura.blacksmith@example.com',
                'password' => bcrypt('8756'),
                'phone' => '5364512',
                'birth_date' => '1996-09-09',
                'rol_id' => 2
            ],
            // Usuario 8
            [
                'name' => 'John',
                'last_name' => 'aDoe',
                'email' => 'john.adoe@example.com',
                'password' => bcrypt('9654'),
                'phone' => '12348719',
                'birth_date' => '1980-05-05',
                'rol_id' => 2
            ],
            // Usuario 9
            [
                'name' => 'Juan',
                'last_name' => 'Faja',
                'email' => 'juan.faja@example.com',
                'password' => bcrypt('7845'),
                'phone' => '84721093',
                'birth_date' => '1985-07-07',
                'rol_id' => 2
            ],
            // Usuario 10
            [
                'name' => 'Daniel',
                'last_name' => 'Casty',
                'email' => 'dani.casty@example.com',
                'password' => bcrypt('8547'),
                'phone' => '87454692',
                'birth_date' => '1990-10-12',
                'rol_id' => 2
            ]
        ]);
    }
}