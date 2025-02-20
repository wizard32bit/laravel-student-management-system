<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\ClassType;
use Faker\Factory as Faker;


class GradesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grades')->delete();

        $this->createGrades();
    }

    protected function createGrades()
    {

        $d = [];
        $faker= Faker::create();

        $class_type_ids= ClassType::pluck('id')->toArray();
        $names= ['A','B','C','D','E','F'];
        $mark_from= [70, 60, 50, 45, 40, 0];
        $mark_to= [100, 69, 59, 49, 44, 39];
        $remark= ['Excellent', 'Very Good', 'Good', 'Pass', 'Poor', 'Fail'];
        foreach($names as $index => $name){
            $d[]=[
                'class_type_id' => $faker->randomElement($class_type_ids),
                'name' => $name,
                'mark_from' => $mark_from[$index],
                'mark_to' => $mark_to[$index],
                'remark' => $remark[$index],
                'created_at' => now(),
                'updated_at' => now()
            ];
        }
        
        DB::table('grades')->insert($d);
    }
}
