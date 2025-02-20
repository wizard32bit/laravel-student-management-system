<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ExamsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Insert sample exam data
        foreach (range(1, 40) as $index) {
            $year = rand(2023, 2026);

            DB::table('exams')->insert([
                'name' => "Exam {$index} - ". $faker->word, // Random exam name like "Math Exam"
                'term' => $faker->numberBetween(1, 2), // Random term, either 1 or 2
                'year' => $year . '-' . ($year + 1), // Format year like '2024-2025'
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
