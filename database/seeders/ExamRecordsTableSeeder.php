<?php

namespace Database\Seeders;
use App\Helpers\Qs;
use App\Models\Mark;
use App\Models\Skill;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class ExamRecordsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $students= Mark::distinct()->pluck('student_id');
        $skills_af= Skill::where('skill_type', 'AF')->get();
        $skills_ps= Skill::where('skill_type', 'PS')->get();
        $data=[];

        // Insert sample marks data
        foreach ($students as $student) {
            $af='';
            foreach($skills_af as $skill_af){
                $af.=rand(1, 5).',';
            }
            $af= rtrim($af, ',');
            
            $ps='';
            foreach($skills_ps as $skill_ps){
                $ps.=rand(1, 5).',';
            }
            $ps= rtrim($ps, ',');
            
            $total= $faker->numberBetween(0, 100);
            $comment= '';
            if(80<=$total && $total<=100){
                $comment= 'Excellent';
            }elseif(60<=$total && $total<80){
                $comment= 'Good';
            }elseif(40<=$total && $total<60){
                $comment= 'Medium';
            }else{
                $comment= 'Low';
            }
            $exam_id= Mark::where('student_id', $student)->value('exam_id');
            $data[]=[
                'exam_id' => $exam_id,
                'student_id' => $student,
                'my_class_id' => Mark::where(['student_id'=> $student, 'exam_id'=>$exam_id])->value('my_class_id'),
                'section_id' => Mark::where(['student_id'=> $student, 'exam_id'=>$exam_id])->value('section_id'),
                'total' => $total,
                'ave' => $faker->numberBetween(10, 100),
                'class_ave' => $faker->numberBetween(50, 100),
                'pos' => $faker->numberBetween(0, 100),
                'af' => $af,
                'ps' => $ps,
                'p_comment' => $comment,
                't_comment' => $comment,
                'year' => Mark::where(['student_id'=> $student, 'exam_id'=>$exam_id])->value('year'),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        DB::table('exam_records')->insert($data);
    }
}