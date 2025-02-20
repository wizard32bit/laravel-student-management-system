<?php

namespace Database\Seeders;

use App\Models\MyClass;
use App\Models\User;
use App\Models\Subject;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->delete();

        $this->createSubjects();
    }

    protected function createSubjects()
    {
        $subjects = [
            'English Language', 'Mathematics', 'Computer Science', 'Web Development', 
            'Data Science', 'Business Management', 'Accounting', 'Healthcare Management', 
            'Public Health', 'Nursing', 'Artificial Intelligence', 'Business Analytics', 
            'Marketing', 'Human Resources', 'Economics'
        ];
        $sub_slug = [
            'eng', 'math', 'cs', 'webdev', 'datasci', 'businessmgmt', 'acc', 
            'healthmgmt', 'publichealth', 'nursing', 'ai', 'businessanalytics', 
            'marketing', 'hr', 'econ'
        ];

        $teachers = User::where('user_type', 'teacher')->get()->pluck('id');
        $my_classes = MyClass::all();

        foreach ($my_classes as $my_class) {
            $data = [];
            $selectedSubjects = array_rand(array_flip($subjects), 7);

            $selectedSlugs = array_map(function($subject) use ($subjects, $sub_slug) {
                $index = array_search($subject, $subjects);
                return ($index !== false) ? $sub_slug[$index] : null;
            }, $selectedSubjects);
            foreach ($selectedSubjects as $index => $subject) {
                $teacher = $teachers->random();
                $data[] = [
                    'name' => $subject,
                    'slug' => $selectedSlugs[$index],
                    'my_class_id' => $my_class->id,
                    'teacher_id' => $teacher,
                    'created_at' => now(),
                    'updated_at' => now()
                ];
            }
            DB::table('subjects')->insert($data);
        }
    }
}
