<?php

namespace Database\Seeders;

use App\Models\Mark;
use App\Models\MyClass;
use App\Models\ClassType;
use App\Models\Setting;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class PaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker= Faker::create();
        $data= [];
        $marks= Mark::pluck('id');
        
        foreach($marks as $mark) {
            $i=1;
            // Get Mark instance to avoid repeated queries
            $markInstance = Mark::find($mark);
            
            // Fetch associated class and class type
            $myClass = MyClass::find($markInstance->my_class_id);
            $classType = ClassType::find($myClass->class_type_id);
        
            // Get the code from class type
            $class_type_code = $classType->code;
        
            // Get the fees from settings
            $fees = Setting::where('type', 'next_term_fees_' . strtolower($class_type_code))->value('description');
            
            // Add data to array
            $data[] = [
                'title' => 'Payment N°: '.$i++,
                'amount' => $fees,
                'ref_no' => $faker->unique()->bothify('?????#####'),
                'method' => $faker->randomElement(['cash', 'credit']),
                'my_class_id' => $myClass->id,
                'description' => Str::random(10),
                'year' => $markInstance->year,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }        
        DB::table('payments')->insert($data);
    }
}
