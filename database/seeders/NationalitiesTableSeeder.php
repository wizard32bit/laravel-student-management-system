<?php
namespace Database\Seeders;

use App\Models\Nationality;
use Illuminate\Database\Seeder;

class NationalitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nationals = array(
            'Austria'      =>  'Austrian',
            'Belgium'      =>  'Belgian' ,
            'UK'           =>  'British' ,
            'Denmark'      =>  'Danish'  ,
            'Netherlands'  =>  'Dutch'   ,
            'France'       =>  'French'  ,
            'Germany'      =>  'German'  ,
            'Italy'        =>  'Italian' ,
            'Portugal'     =>  'Portugue',
            'Russia'       =>  'Russian' ,
            'Spain'        =>  'Spanish' ,
            'Sweden'       =>  'Swedish' ,
            'Switzerland'  =>  'Swiss'   
        );

        foreach ($nationals as $n) {
            Nationality::create(['name' => $n]);
        }
    }
}
