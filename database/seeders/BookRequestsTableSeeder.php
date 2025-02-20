<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


use Faker\Factory as Faker;
use App\Models\User;
use App\Models\Book;

class BookRequestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data=[];
        $faker= Faker::create();
        $student_ids=User::where('user_type', 'student')->pluck('id');
        $book_ids= Book::pluck('id');
        for($index=1; $index<30; $index++){
            $data[]=[
                'book_id' => $faker->randomElement($book_ids),
                'user_id' => $faker->randomElement($student_ids),
                'start_date' => $faker->dateTimeBetween('-1 month', '+1 month')->format('d/m/Y'),
                'end_date' => $faker->dateTimeBetween('+1 month', '+3 month')->format('d/m/Y'),
                'returned' => $faker->dateTimeBetween('+3 week', '+6 week')->format('d/m/Y'),
                'status' => $faker->randomElement(['Good', 'Bad']),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        } 
        DB::table('book_requests')->insert($data);
    }
}
