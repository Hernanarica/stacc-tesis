<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OpinionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('opinions')->insert([
            [
                'user_id' => 1,
                'local_id' => 1,
                'score' => 5,
                'opinion' => 'Muy buen local',
                'current_date' => date('Y-m-d'),
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ],
            [
                'user_id' => 2,
                'local_id' => 2,
                'score' => 4,
                'opinion' => 'Buen local',
                'current_date' => date('Y-m-d'),
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ],
            [
                'user_id' => 3,
                'local_id' => 2,
                'score' => 3,
                'opinion' => 'Regular',
                'current_date' => date('Y-m-d'),
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ],
            [
                'user_id' => 4,
                'local_id' => 1,
                'score' => 2,
                'opinion' => 'Malo',
                'current_date' => date('Y-m-d'),
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ],
            [
                'user_id' => 5,
                'local_id' => 1,
                'score' => 1,
                'opinion' => 'Muy malo',
                'current_date' => date('Y-m-d'),
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ],
        ]);
    }
}
