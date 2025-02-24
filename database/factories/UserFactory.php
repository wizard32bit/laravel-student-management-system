<?php

namespace Database\Factories;

use App\Helpers\Qs;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
/**
* The name of the factory's corresponding model.
*
* @var string
*/
    protected $model = User::class;

/**
* Define the model's default state.
*
* @return array
*/
    public function definition()
    {
        // Create random User Type
        $user_types = Qs::getStaff(['super_admin', 'librarian', 'student']);
        $user_type = $user_types[array_rand($user_types)];

        return [
            'name' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'username' => $this->faker->userName,
            'password' => Hash::make('cj'),
            'user_type' => $user_type,
            'code' => strtoupper(Str::random(10)),
            'remember_token' => Str::random(10),
            'photo' => Qs::getImagePathOnSeeding($user_type) 
        ];
    }
}
