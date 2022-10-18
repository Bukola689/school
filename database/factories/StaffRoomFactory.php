<?php

namespace Database\Factories;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

class StaffRoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $room = $this->faker->numberBetween($min = 01, $max=30);

        return [
            'teacher_id' => Teacher::all()->random()->id,
            'room_no' => $room
        ];
    }
}
