<?php

namespace App\Repository\Admin;

use App\Models\Teacher;
use Illuminate\Http\Request;

interface ITeacherRepository
{
    public function saveTeacher(Request $request, array $data);

     public function updateTeacher(Request $request, Teacher $teacher, array $data);

     public function removeTeacher(Teacher $teacher);
}