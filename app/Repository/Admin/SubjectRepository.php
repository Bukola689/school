<?php

namespace App\Repository\Admin;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectRepository implements ISubjectRepository
{
    public function saveSubject(Request $request, array $data)
    {
        $subject = new Subject;
        $subject->class_type_id = $request->input('class_type_id');
        $subject->name = $request->input('name');
        $subject->code = $request->input('code');
        $subject->save();
    }

     public function updateSubject(Request $request, Subject $subject, array $data)
     {
        $subject->class_type_id = $request->input('class_type_id');
        $subject->name = $request->input('name');
        $subject->code = $request->input('code');
        $subject->update();
     }

     public function removeSubject(Subject $subject)
     {
        $subject = $subject->delete();
     }
}