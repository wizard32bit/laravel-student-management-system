<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;
use App\Models\User;

class StaffRecordsTableSeeder extends Seeder
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
        $users_id= User::whereIn('user_type', ['accountant', 'librarian', 'teacher'])->pluck('id');

        foreach($users_id as $user_id){
            $data[]=[
                'user_id' => $user_id,
                'code' => $faker->unique()->bothify('?????#####'),
                'emp_date' => strtoupper($faker->dateTimeBetween('1 year', '5 year')),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        DB::table('staff_records')->insert($data);
    }
}
