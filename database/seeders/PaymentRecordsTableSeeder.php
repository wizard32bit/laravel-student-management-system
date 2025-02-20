<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Payment;
use App\Models\Mark;
use Faker\Factory as Faker;


class PaymentRecordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];
        $faker = Faker::create();
    
        $marks = Mark::pluck('id');
        $payments = Payment::pluck('id');

        foreach ($payments as $payment) {
            $payment_amount= Payment::where('id', $payment)->value('amount');
            $amt_paid= rand(0, $payment_amount);
            $balance= $payment_amount - $amt_paid;
            if(0 == $balance){
                $paid= 1;
            }else{
                $paid= 0;
            }
            $data[] = [
                'payment_id' => $payment,
                'student_id' => Mark::where('my_class_id', Payment::where('id', $payment)->value('my_class_id'))
                    ->value('student_id'),
                'ref_no' => strtoupper($faker->unique()->bothify('?????')).$faker->unique()->bothify('#####'),
                'amt_paid' => $amt_paid,
                'balance' => $balance,
                'paid' => $paid,
                'year' => Payment::where('id', $payment)->value('year'),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
    
        // Insert the data into the database
        DB::table('payment_records')->insert($data);
    }
}
