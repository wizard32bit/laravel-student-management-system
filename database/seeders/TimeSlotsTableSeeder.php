<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use App\Models\TimeTableRecord;

class TimeSlotsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $data = [];

        $ttr_ids = TimeTableRecord::pluck('id');
        $hours_from=[
            1 => '8', //-> '09:30'
            2 => '10',//-> '11:30'
            3 => '13',//-> '14:30'
            4 => '15',//-> '16:30'
            5 => '17',//-> '18:30'
        ];
        
        $hours_to=[
            1 => '9',
            2 => '11',
            3 => '14',
            4 => '16',
            5 => '18',
        ];
        

        foreach ($ttr_ids as $ttr_id) {
            $used_timestamps = [];

            for ($i = 1; $i <= 5; $i++) {
                do {
                    $hour_from = $hours_from[$i];
                    $min_from= '00';
                    $meridian_from= $hour_from <12 ? 'AM' :'PM';

                    $hour_to= $hour_from +1;
                    $min_to= '30';
                    $meridian_to= $hour_to <12 ? 'AM' :'PM';

                    $timestamp_from = mktime($hour_from, $min_from, 0, date('m'), date('d'), date('Y'));
                    $timestamp_to = mktime($hour_to, $min_to, 0, date('m'), date('d'), date('Y'));

                    $key = "$timestamp_from-$timestamp_to-$ttr_id";
                } while (isset($used_timestamps[$key]));
                $used_timestamps[$key] = true;

                $data[] = [
                    'ttr_id' => $ttr_id,
                    'hour_from' => $hour_from,
                    'min_from' => $min_from,
                    'meridian_from' => $meridian_from,
                    'hour_to' => $hour_to,
                    'min_to' => $min_to,
                    'meridian_to' => $meridian_to,
                    'time_from' => date('g:i A', $timestamp_from),
                    'time_to' => date('g:i A', $timestamp_to),
                    'timestamp_from' => $timestamp_from,
                    'timestamp_to' => $timestamp_to,
                    'full' => date('g:i A', $timestamp_from) . ' - ' . date('g:i A', $timestamp_to),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        DB::table('time_slots')->insert($data);
    }
}
