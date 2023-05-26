<?php

namespace App\Repository\Admin;

use App\Models\Student;
use Illuminate\Http\Request;

interface IStudentRepository
{
    public function saveStudent(Request $request, array $data);

    //   public function updateStudent(Request $request, Student $student, array $data);

    //   public function removeStudent(Student $student);
}