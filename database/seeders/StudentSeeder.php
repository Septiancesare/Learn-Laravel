<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['id' => 1, 'name' => 'Mariadi', 'score' => 95],
            ['id' => 2, 'name' => 'Roni', 'score' => 80],
            ['id' => 3, 'name' => 'Fani', 'score' => 100],
            ['id' => 4, 'name' => 'Maria', 'score' => 92],

        ];


        DB::table('students')->insert($data);
    }
}
