<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
{
    // Clear the class_types table before seeding
    DB::table('class_types')->delete();

    // Define the class types
    $data = [
        ['name' => 'Undergraduate', 'code' => 'UG'], // For Undergraduate classes
        ['name' => 'Graduate', 'code' => 'G'],       // For Graduate classes
        ['name' => 'Specialized', 'code' => 'SP'],  // For Specialized programs
        ['name' => 'PhD', 'code' => 'PHD'],         // For PhD programs
    ];

    // Insert the data into the class_types table
    DB::table('class_types')->insert($data);
}

}
