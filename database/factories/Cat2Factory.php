<?php

namespace Database\Factories;

use App\Models\ClassType;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

class Cat2Factory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $score = $this->faker->numberBetween($min = 01, $max=30);
        
        return [
            'class_type_id' => ClassType::all()->random()->id,
            'student_id' => Student::all()->random()->id,
            'teacher_id' => Teacher::all()->random()->id,
            'subject_id' => Subject::all()->random()->id,
            'score' => $score,
        ];
    }
}
