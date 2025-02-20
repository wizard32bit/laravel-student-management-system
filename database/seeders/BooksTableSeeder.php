<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Faker\Factory as Faker;
use App\Models\MyClass;

class BooksTableSeeder extends Seeder
{
    public function run()
    {
        $books = [];
        $faker= Faker::create();

        $bookTypes = ['Fiction', 'Non-Fiction', 'Science', 'History', 'Biography', 'Fantasy', 'Mystery', 'Technology'];
        $locations = ['Library A', 'Library B', 'Library C', 'Library D'];
        $my_classes= MyClass::pluck('id');
        
        for ($i = 1; $i <= 50; $i++) {
            $totalCopies = rand(5, 20);
            $issuedCopies = rand(0, $totalCopies);

            $books[] = [
                'name'          => 'Book ' . $faker->unique()->name,
                'my_class_id'   => $faker->randomElement($my_classes),
                'description'   => 'A detailed description of Book ' . $i,
                'author'        => 'Author ' . $faker->unique()->name,
                'book_type'     => $bookTypes[array_rand($bookTypes)],
                'url'           => 'https://example.com/book/' . $i,
                'location'      => $locations[array_rand($locations)],
                'total_copies'  => $totalCopies,
                'issued_copies' => $issuedCopies,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ];
        }

        DB::table('books')->insert($books);
    }
}
