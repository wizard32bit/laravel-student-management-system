<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ClassType;
use App\Models\MyClass;

class MyClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Fetch all class types to associate with the new MyClass records
        $classTypes = ClassType::all(); 

        // Seed MyClass records for each class type
        foreach ($classTypes as $classType) {
                // Create MyClass record
                MyClass::create([
                    'name' => $classType->name,            // Example: "Mathematics 1-3"
                    'class_type_id' => $classType->id, // Associate with the class type
                ]);
        }
    }
}