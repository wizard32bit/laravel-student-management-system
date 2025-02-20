<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->delete();
        $actualYear = date('Y');
        $yearRange = $actualYear .'-'. ($actualYear + 1);

        $data = [
            ['type' => 'current_session', 'description' => $yearRange],
            ['type' => 'system_title', 'description' => 'MLIU'],
            ['type' => 'system_name', 'description' => 'ML International University'],
            ['type' => 'term_begins', 'description' => '1/10/'.$actualYear],
            ['type' => 'term_ends', 'description' => '7/7/'.$actualYear],
            ['type' => 'phone', 'description' => '0123456789'],
            ['type' => 'address', 'description' => 'Königinstraße 5, 80539 München, Allemagne'],
            ['type' => 'system_email', 'description' => 'contact@mliu.com'],
            ['type' => 'alt_email', 'description' => ''],
            ['type' => 'email_host', 'description' => ''],
            ['type' => 'email_pass', 'description' => ''],
            ['type' => 'lock_exam', 'description' => 0],
            ['type' => 'logo', 'description' => asset('global_assets/images/favicon.png')],
            ['type' => 'next_term_fees_ug', 'description' => '7500'],
            ['type' => 'next_term_fees_g', 'description' => '10000'],
            ['type' => 'next_term_fees_sp', 'description' => '12500'],
            ['type' => 'next_term_fees_phd', 'description' => '17500'],
        ];

        DB::table('settings')->insert($data);

    }
}
