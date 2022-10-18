<?php

namespace Database\Factories;

use App\Models\MyClass;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClassTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'my_class_id' => MyClass::all()->random()->id,
            'name' => $this->faker->name,
        ];
    }
}
