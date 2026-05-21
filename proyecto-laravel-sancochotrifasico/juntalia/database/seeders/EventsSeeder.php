<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventsSeeder extends Seeder
{
    public function run()
    {
        DB::table('events')->insert([
            [
                'name' => 'Hackathon Manizales 2025',
                'description' => 'Un evento para desarrolladores y emprendedores tecnológicos.',
                'user_id' => 1,
                'category_id' => 1,
                'city_id' => 6,
                'event_date_time' => '2025-03-10 09:00:00',
                'age_restriction' => 'Todo público',
                'cost' => 0.00,
                'status' => 'Activo',
                'pets' => false,
                'address' => 'Universidad Nacional de Colombia',
                'lat' => 5.070275,
                'lng' => -75.513817
            ],
            [
                'name' => 'Feria del Café y Tecnología',
                'description' => 'Explora innovaciones tecnológicas y disfruta del mejor café de la región.',
                'user_id' => 2,
                'category_id' => 2,
                'city_id' => 6,
                'event_date_time' => '2025-04-15 10:00:00',
                'age_restriction' => 'Todo público',
                'cost' => 15.00,
                'status' => 'Activo',
                'pets' => true,
                'address' => 'Centro de Convenciones',
                'lat' => 5.065548,
                'lng' => -75.517906
            ],
            [
                'name' => 'Startup Weekend Manizales',
                'description' => 'Desarrolla tu idea de negocio en 54 horas con mentores y expertos.',
                'user_id' => 3,
                'category_id' => 5,
                'city_id' => 6,
                'event_date_time' => '2025-05-20 18:00:00',
                'age_restriction' => '+16',
                'cost' => 25.00,
                'status' => 'Activo',
                'pets' => false,
                'address' => 'Manizales Hub de Innovación',
                'lat' => 5.063285,
                'lng' => -75.517490
            ],
            [
                'name' => 'Taller de Inteligencia Artificial',
                'description' => 'Aprende sobre Machine Learning y AI en este taller práctico.',
                'user_id' => 4,
                'category_id' => 3,
                'city_id' => 6,
                'event_date_time' => '2025-06-12 14:00:00',
                'age_restriction' => '+18',
                'cost' => 30.00,
                'status' => 'Activo',
                'pets' => false,
                'address' => 'Universidad de Caldas Sede Central',
                'lat' => 5.070565,
                'lng' => -75.514030
            ],
            [
                'name' => 'Foro de Marketing Digital',
                'description' => 'Expertos comparten estrategias de marketing para negocios digitales.',
                'user_id' => 5,
                'category_id' => 4,
                'city_id' => 6,
                'event_date_time' => '2025-07-08 10:30:00',
                'age_restriction' => 'Todo público',
                'cost' => 20.00,
                'status' => 'Activo',
                'pets' => false,
                'address' => 'Hotel Estelar',
                'lat' => 5.065872,
                'lng' => -75.515623
            ],
            [
                'name' => 'Expo Emprendimiento 2025',
                'description' => 'Conoce startups y emprendedores de la región.',
                'user_id' => 6,
                'category_id' => 5,
                'city_id' => 6,
                'event_date_time' => '2025-08-18 09:00:00',
                'age_restriction' => 'Todo público',
                'cost' => 10.00,
                'status' => 'Activo',
                'pets' => true,
                'address' => 'Plaza de Bolívar',
                'lat' => 5.067779,
                'lng' => -75.518711
            ],
            [
                'name' => 'Carrera 5K Tecnológica',
                'description' => 'Corre y disfruta de un evento tecnológico en el camino.',
                'user_id' => 7,
                'category_id' => 6,
                'city_id' => 6,
                'event_date_time' => '2025-09-25 07:00:00',
                'age_restriction' => 'Todo público',
                'cost' => 5.00,
                'status' => 'Activo',
                'pets' => true,
                'address' => 'Estadio Palogrande',
                'lat' => 5.067123,
                'lng' => -75.520313
            ],
            [
                'name' => 'Manizales Blockchain Summit',
                'description' => 'Descubre el potencial del blockchain y las criptomonedas.',
                'user_id' => 8,
                'category_id' => 7,
                'city_id' => 6,
                'event_date_time' => '2025-10-10 09:00:00',
                'age_restriction' => '+16',
                'cost' => 40.00,
                'status' => 'Activo',
                'pets' => false,
                'address' => 'Cámara de Comercio',
                'lat' => 5.068942,
                'lng' => -75.517840
            ],
            [
                'name' => 'Simposio de Innovación en Salud',
                'description' => 'Cómo la tecnología está revolucionando el sector salud.',
                'user_id' => 9,
                'category_id' => 8,
                'city_id' => 6,
                'event_date_time' => '2025-11-20 15:00:00',
                'age_restriction' => 'Todo público',
                'cost' => 50.00,
                'status' => 'Activo',
                'pets' => false,
                'address' => 'Clínica SES, Manizales',
                'lat' => 5.065217,
                'lng' => -75.521015
            ],
            [
                'name' => 'Tech Meetup Manizales',
                'description' => 'Conoce y conecta con profesionales de la tecnología en la ciudad.',
                'user_id' => 10,
                'category_id' => 9,
                'city_id' => 6,
                'event_date_time' => '2025-12-05 18:00:00',
                'age_restriction' => '+18',
                'cost' => 0.00,
                'status' => 'Activo',
                'pets' => false,
                'address' => 'Café La Terraza',
                'lat' => 5.063982,
                'lng' => -75.517201
            ],
            [
                'name' => 'Tech Meetup Madrid',
                'description' => 'Conoce y conecta con profesionales de la tecnología en la capital de España.',
                'user_id' => 10,
                'category_id' => 9,
                'city_id' => 11, 
                'event_date_time' => '2025-12-05 18:00:00',
                'age_restriction' => '+18',
                'cost' => 0.00,
                'status' => 'Activo',
                'pets' => false,
                'address' => 'WeWork Castellana, Paseo de la Castellana 77, Madrid',
                'lat' => 40.446179,
                'lng' => -3.691014,
            ]
        ]);
    }
}
