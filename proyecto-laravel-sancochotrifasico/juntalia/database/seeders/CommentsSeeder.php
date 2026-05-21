<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentsSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 30; $i++) {
            DB::table('comments')->insert([
                'user_id' => rand(1, 10),
                'event_id' => rand(1, 10),
                'comment' => 'This is a comment for event ' . rand(1, 10),
            ]);
        }
    }
}
