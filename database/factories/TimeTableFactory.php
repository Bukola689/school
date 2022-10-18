<?php

namespace Database\Factories;

use App\Models\ClassType;
use App\Models\Term;
use App\Models\Teacher;
use App\Models\Session;
use App\Models\Subject;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class TimeTableFactory extends Factory
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
            'term_id' => Term::all()->random()->id,
            'subject_id' => Subject::all()->random()->id,
            'teacher_id' => Teacher::all()->random()->id,
            'session_id' => Session::all()->random()->id,
            'created_at' => $this->faker->date,
        ];
    }
}
