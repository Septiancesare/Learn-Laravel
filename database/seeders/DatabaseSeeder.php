<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $faker = Faker::create('id_ID');

        for($i = 1; $i <= 20; $i++){
            DB::table('students')->insert([
                'name' => $faker->name,
                'score' => $faker->numberBetween(0,100),
                'teacher_id'=>$faker->numberBetween(1,20)
            ]);
            DB::table('teachers')->insert([
                'name' => $faker->name
            ]);
        }
    }
}
