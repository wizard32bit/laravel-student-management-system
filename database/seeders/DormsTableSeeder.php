<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DormsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $names=[
            'Faith Hostel' => 'Berliner Str. 12, 10117 Berlin, Germany',
            'Peace Hostel'  => 'Münchner Str. 45, 80331 Munich, Germany',
            'Grace Hostel'  => 'Königsallee 90, 40212 Düsseldorf, Germany',
            'Success Hostel'=> 'Friedrichstr. 200, 20359 Hamburg, Germany',
            'Trust Hostel'  => 'Zeil 5, 60313 Frankfurt, Germany'
        ];
    
        $data= [];
        foreach($names as $name=> $address){
            $data[]=[
                'name' => $name,
                'description' => $address,
                'created_at' => now(),
                'updated_at' => now()
            ];
        }
        DB::table('dorms')->insert($data);
    }
}
