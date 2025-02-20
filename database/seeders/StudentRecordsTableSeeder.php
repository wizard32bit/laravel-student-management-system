<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Dorm;
use App\Models\Section;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Carbon\Carbon;

class StudentRecordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('student_records')->truncate();

        $students = User::where('user_type', 'student')->pluck('id')->toArray();
        $section_ids = Section::pluck('id')->toArray();
        $my_parents = User::where('user_type', 'parent')->pluck('id')->toArray();
        $dorm_ids = Dorm::pluck('id')->toArray();

        $faker = Faker::create();
        $data = [];

        foreach ($students as $id) {
            $section_id = $faker->randomElement($section_ids);
            $year = rand(2024, 2027);

            $data[] = [
                'user_id' => $id,
                'my_class_id' => Section::where('id', $section_id)->value('my_class_id'),
                'section_id' => $section_id,
                'adm_no' => Str::random(7),
                'my_parent_id' => !empty($my_parents) ? $faker->randomElement($my_parents) : null,
                'dorm_id' => !empty($dorm_ids) ? $faker->randomElement($dorm_ids) : null,
                'dorm_room_no' => rand(1, 100),
                'session' => $year . '-' . ($year + 1),
                'house' => Str::random(10),
                'age' => rand(18, 25),
                'year_admitted' => $year - rand(1, 3),
                'grad' => 1,
                'grad_date' => Carbon::create($year + 4, rand(1, 12), rand(1, 28))->format('d/m/Y'),
                'created_at' => now(),
                'updated_at' => now()->addMinutes(5),
            ];
        }

        DB::table('student_records')->insert($data);
    }
}
