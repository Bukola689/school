<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Occupation;
use App\Models\Country;
use App\Models\State;
use App\Models\LocalGovernment;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $phone_number = $this->faker->numberBetween($min = 100000, $max=300000);
        $age = $this->faker->numberBetween($min = 1, $max=20);

        return [
            'user_id' =>  User::all()->random()->id,
            'first_name' => $this->faker->name,
            'last_name' => $this->faker->name,
            'phone_number' => $phone_number,
            'd_o_b' => '2021-05-07',
            'gender' => 'male',
            'age' => $age,
            'image' => $this->faker->imageUrl($width = 140, $height=300),
            'address' => $this->faker->sentence(),
            'occupation_id' => Occupation::all()->random()->id,
            'country_id' => Country::all()->random()->id,
            'state_id' => State::all()->random()->id,
            'local_government_id' => LocalGovernment::all()->random()->id,
            'qualification' => 'Master',
        ];
    }
}
