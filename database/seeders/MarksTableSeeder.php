<?php

namespace Database\Seeders;

use App\Models\Exam;
use App\Models\StudentRecord;
use App\Models\Subject;
use App\Models\Grade;
use App\Helpers\Qs;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MarksTableSeeder extends Seeder
{
    public function run()
    {
        $exams = Exam::where('year', Qs::getCurrentSession())->pluck('id')->toArray();
        $grades = Grade::pluck('id')->toArray();
        $faker = Faker::create();
        
        StudentRecord::chunk(100, function ($students) use ($exams, $grades, $faker) {
            
            $year = Qs::getCurrentSession();
            $data = [];
            foreach ($students as $student) {
                $subjects = Subject::where('my_class_id', $student->my_class_id)->orderBy('id', 'asc') 
                ->pluck('id')
                ->toArray();
                
                $exam_id= $faker->randomElement($exams);
                foreach ($subjects as $subject) {
                        $data[] = [
                            'student_id' => $student->user_id,
                            'my_class_id' => $student->my_class_id,
                            'section_id' => $student->section_id,
                            'exam_id' => $exam_id,
                            'subject_id' => $subject,
                            't1' => $faker->numberBetween(0, 20),
                            't2' => $faker->numberBetween(0, 20),
                            't3' => $faker->numberBetween(0, 20),
                            't4' => $faker->numberBetween(0, 20),
                            'tca' => $faker->numberBetween(0, 20),
                            'exm' => $faker->numberBetween(0, 60),
                            'tex1' => $faker->numberBetween(0, 60),
                            'tex2' => $faker->numberBetween(0, 60),
                            'tex3' => $faker->numberBetween(0, 60),
                            'sub_pos' => $faker->randomElement([1, 2, 3, 4]),
                            'cum' => $faker->numberBetween(0, 100),
                            'cum_ave' => $faker->randomFloat(2, 0, 100),
                            'grade_id' => !empty($grades) ? $faker->randomElement($grades) : null,
                            'year' => $year,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                }

            if (!empty($data)) {
                DB::table('marks')->insert($data);
            }
        });
    }
}
