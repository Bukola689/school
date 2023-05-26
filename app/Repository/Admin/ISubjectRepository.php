<?php

namespace App\Repository\Admin;

use App\Models\Subject;
use Illuminate\Http\Request;

interface ISubjectRepository
{
    public function saveSubject(Request $request, array $data);

     public function updateSubject(Request $request, Subject $subject, array $data);

     public function removeSubject(Subject $subject);
}