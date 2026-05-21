<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitiesSeeder extends Seeder
{
    public function run()
    {
        DB::table('cities')->insert([
            ['name' => 'Bogotá'],
            ['name' => 'Medellín'],
            ['name' => 'Cali'],
            ['name' => 'Barranquilla'],
            ['name' => 'Cartagena'],
            ['name' => 'Manizales'],
            ['name' => 'Pereira'],
            ['name' => 'Armenia'],
            ['name' => 'Bucaramanga'],
            ['name' => 'Santa Marta'],
            ['name' => 'Madrid']
        ]);
    }
}
