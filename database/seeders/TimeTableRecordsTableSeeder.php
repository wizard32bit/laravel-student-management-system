<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mark;
use App\Models\MyClass;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class TimeTableRecordsTableSeeder extends Seeder
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

        $marks_ids= Mark::pluck('id');
        foreach($marks_ids as $mark){
            $class_name = MyClass::where('id', Mark::where('id', $mark)->value('my_class_id'))->value('name');
            $unique_name = $class_name . ' - ' . uniqid();
            $data[]=[
                'name' => $unique_name,
                'my_class_id' => Mark::where('id', $mark)->value('my_class_id'),
                'exam_id' => Mark::where('id', $mark)->value('exam_id'),
                'year' => Mark::where('id', $mark)->value('year'),
                'created_at' => now(),
                'updated_at' => now(),
            ];

        }
        DB::table('time_table_records')->insert($data);
    }
}
