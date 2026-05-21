<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => 'Taller'],
            ['name' => 'Conferencia'],
            ['name' => 'Seminario'],
            ['name' => 'Concierto'],
            ['name' => 'Exhibición'],
            ['name' => 'Festival'],
            ['name' => 'Reunión'],
            ['name' => 'Webinar'],
            ['name' => 'Evento de caridad'],
            ['name' => 'Entrenamiento']
        ]);
    }
}
