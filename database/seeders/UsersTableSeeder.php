<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Helpers\Qs;
use App\Models\StudentRecord;
use App\Models\BloodGroup;
use App\Models\State;
use App\Models\Lga;
use App\Models\Nationality;

use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createNewUsers();
        $this->createManyUsers(3);
    }

    protected function createNewUsers()
    {
        $password = Hash::make('cj');
        $d = [
            ['name' => 'System Admin',
                'email' => 'sys.admin@mliu.com',
                'username' => 'sysAdmin',
                'password' => $password,
                'user_type' => 'super_admin',
                'code' => strtoupper(Str::random(10)),
                'remember_token' => Str::random(10),
                'photo' => Qs::getImagePathOnSeeding('super_admin'),
            ],
            ['name' => 'Admin A',
                'email' => 'admin@mliu.com',
                'password' => $password,
                'user_type' => 'admin',
                'username' => 'admin',
                'code' => strtoupper(Str::random(10)),
                'remember_token' => Str::random(10),
                'photo' => Qs::getImagePathOnSeeding('admin'),
            ],
            ['name' => 'Teacher',
                'email' => 'teacher@mliu.com',
                'username' => 'teacher',
                'password' => $password,
                'user_type' => 'teacher',
                'code' => strtoupper(Str::random(10)),
                'remember_token' => Str::random(10),
                'photo' => Qs::getImagePathOnSeeding('teacher'),
            ],
            ['name' => 'Parent',
                'email' => 'parent@example.com',
                'password' => $password,
                'user_type' => 'parent',
                'username' => 'parent',
                'code' => strtoupper(Str::random(10)),
                'remember_token' => Str::random(10),
                'photo' => Qs::getImagePathOnSeeding('parent'),
            ],
            ['name' => 'Accountant',
                'email' => 'accountant@mliu.com',
                'password' => $password,
                'user_type' => 'accountant',
                'username' => 'accountant',
                'code' => strtoupper(Str::random(10)),
                'remember_token' => Str::random(10),
                'photo' => Qs::getImagePathOnSeeding('accountant'),
            ],
            ['name' => 'Student',
                'email' => 'student@mliu.com',
                'password' => $password,
                'user_type' => 'student',
                'username' => 'student',
                'code' => strtoupper(Str::random(10)),
                'remember_token' => Str::random(10),
                'photo' => Qs::getImagePathOnSeeding('student'),
            ],
            
        
            // Add other users here
        ];

        DB::table('users')->insert($d);
    }

    protected function createManyUsers(int $count)
    {
        $data = [];
        $faker = Faker::create();
        $user_types = Qs::getAllUserTypes(['super_admin', 'admin']);
        foreach ($user_types as $user_type) {
            for ($i = 1; $i <= $count; $i++) {
                $dob= "";
                if(in_array($user_type, ['teacher', 'accountant', 'librarian', 'parent']))
                    $dob= $faker->dateTimeBetween('-50 years', '-30 years')->format('d/m/Y');
                else
                    $dob= $faker->dateTimeBetween('-25 years', '-18 years')->format('d/m/Y');

                $data[] = [
                    'name' => $faker->unique()->name,
                    'email' => $faker->unique()->safeEmail,
                    'code' => strtoupper(Str::random(10)),
                    'username' => $user_type . $i,
                    'user_type' => $user_type,
                    'dob' => $dob,
                    'gender' => $faker->randomElement(['M', 'F']),
                    'photo' => Qs::getImagePathOnSeeding($user_type),
                    'phone' => $faker->numberBetween(20000000, 99888777),
                    'bg_id' => $faker->randomElement(BloodGroup::pluck('id')),
                    'state_id' => $faker->randomElement(State::pluck('id')), // Fixed typo
                    'lga_id' => $faker->randomElement(Lga::pluck('id')), // Fixed typo
                    'nal_id' => $faker->randomElement(Nationality::pluck('id')), // Fixed typo
                    'address' => Str::random(10),
                    'password' => Hash::make('cj'),
                    'remember_token' => Str::random(10), // Fixed typo
                    'created_at' => now(),
                    'updated_at' => now(),
                ];

            }
        }
        DB::table('users')->insert($data);
    }
}