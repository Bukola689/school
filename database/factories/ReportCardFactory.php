<?php

namespace Database\Factories;

use App\Models\Examination;
use App\Models\Term;
use App\Models\Subject;
use App\Models\ClassType;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Cat1;
use App\Models\Cat2;
use App\Models\Cat3;
use App\Models\Session;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReportCardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $position = $this->faker->numberBetween($min = 1, $max=30);
        $percentage = $this->faker->numberBetween($min = 10, $max=100);

        return [
            'term_id' => Term::all()->random()->id,
            'class_type_id' => ClassType::all()->random()->id,
            'subject_id' => Subject::all()->random()->id,
            'student_id' => Student::all()->random()->id,
            'teacher_id' => Teacher::all()->random()->id,
            'session_id' => Session::all()->random()->id,
            'cat1_id' => Cat1::all()->random()->id,
            'cat2_id' => Cat2::all()->random()->id,
            'cat3_id' => Cat3::all()->random()->id,
            'examination_id' => Examination::all()->random()->id,
            'position' => $position,
            'percentage' => $percentage,
            'comments' => $this->faker->sentence(),
            'user_id' => User::all()->random()->id,
        ];
    }
}
