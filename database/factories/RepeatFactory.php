<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\ClassType;
use App\Models\Session;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

class RepeatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'class_type_id' => ClassType::all()->random()->id,
            'session_id' => Session::all()->random()->id,
            'student_id' => Student::all()->random()->id,
            'teacher_id' => Teacher::all()->random()->id,
        ];
    }
}
