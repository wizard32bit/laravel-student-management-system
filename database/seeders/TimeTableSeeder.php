<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use App\Models\TimeTableRecord;
use App\Models\TimeSlot;
use App\Models\Subject;

class TimeTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $data = [];

        $ttr_ids = TimeTableRecord::pluck('id');
        $ts_ids = TimeSlot::pluck('id');
        $subjects = Subject::pluck('id');

        foreach ($ttr_ids as $ttr_id) {
            foreach ($ts_ids as $ts_id) {
                $timestamp_from = TimeSlot::where('id', $ts_id)->value('timestamp_from');
                $timestamp_to = TimeSlot::where('id', $ts_id)->value('timestamp_to');

                $data[] = [
                    'ttr_id' => $ttr_id,
                    'ts_id' => $ts_id,
                    'subject_id' => $faker->randomElement($subjects->toArray()),
                    'exam_date' => $faker->optional()->date('Y-m-d'),
                    'timestamp_from' => $timestamp_from,
                    'timestamp_to' => $timestamp_to,
                    'day' => $faker->dayOfWeek,
                    'day_num' => $faker->numberBetween(1, 7),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        DB::table('time_tables')->insert($data);
    }
}
