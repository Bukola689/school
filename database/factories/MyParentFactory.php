<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Occupation;
use App\Models\Country;
use App\Models\State;
use App\Models\LocalGovernment;
use Illuminate\Database\Eloquent\Factories\Factory;

class MyParentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $age = $this->faker->numberBetween($min = 30, $max=60);
        $phone_number = $this->faker->numberBetween($min = 100000, $max=300000);

        return [
            'user_id' => User::all()->random()->id,
            'first_name' => $this->faker->name,
            'last_name' => $this->faker->name,
            'age' => $age,
            'phone_number' => $phone_number,
            'gender' => 'male',
            'd_o_b' => '1989-02-09',
            'age' => $age,
            'image' => $this->faker->imageUrl($width = 140, $height=300),
            'occupation_id' => Occupation::all()->random()->id,
            'country_id' => Country::all()->random()->id,
            'state_id' => State::all()->random()->id,
            'local_government_id' => LocalGovernment::all()->random()->id,
            'address' => $this->faker->sentence(),
        ];
    }
}
