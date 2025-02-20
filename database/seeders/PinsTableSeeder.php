<?php

namespace Database\Seeders;

use App\Models\Pin;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PinsTableSeeder extends Seeder
{
    public function run()
    {
        // Get all users
        $users = User::all();

        // Initialize the Faker library
        $faker = Faker::create();

        // Seed 10 Pin records as an example
        foreach (range(1, 10) as $index) {
            $user = $users->random();  // Random user for user_id
            $student = $users->where('user_type', 'student')->random(); // Random student for student_id

            // Create a Pin record
            Pin::create([
                'code' => strtoupper($faker->lexify('?????-?????')), // Generate a random code (e.g., 'ABCDE-12345')
                'user_id' => $user->id,   // Assign a random user for the user_id
                'student_id' => $student->id, // Assign a random student for the student_id
                'times_used' => 0,
                'used' => 0, // Randomly set if the pin is used (50% chance)
            ]);
        }
    }
}
