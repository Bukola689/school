<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class HostelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $block = $this->faker->numberBetween($min = 1, $max=5 );
        $room = $this->faker->numberBetween($min = 01, $max=30);

        return [
            'student_id' => Student::all()->random()->id,
            'block' => $block,
            'room_no' => $room
        ];
    }
}
