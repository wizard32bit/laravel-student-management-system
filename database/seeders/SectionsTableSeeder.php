<?php
namespace Database\Seeders;

use App\Models\User;
use App\Models\MyClass;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() 
    {
        DB::table('sections')->delete();

        $faker= Faker::create();

        $c = MyClass::pluck('id')->all();
        $teachers = User::where('user_type', 'teacher')->get()->pluck('id');

        // Define section names to be used
        $section_names = ['Diamond', 'Platinum', 'Gold', 'Silver', 'Bronze'];

        $data = []; // Initialize an empty array to hold the section data

        foreach ($c as $index => $class_id) {
            // Assign a section name or repeat section names if they run out
            $section_name = $section_names[$index % count($section_names)];

            // Add the section data to the array
            $data[] = [
                'name' => $section_name,
                'my_class_id' => $class_id,
                'teacher_id' => $faker->randomElement($teachers),
                'active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insert the generated data into the sections table
        DB::table('sections')->insert($data);
    }

}
