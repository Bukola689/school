<?php

namespace App\Repository\Admin\Cat2;

use App\Models\Cat2;
use Illuminate\Http\Request;

class Cat2Repository implements ICat2Repository
{
    public function saveCat2(Request $request, array $data)
    {
        $cat2 = new Cat2;
        $cat2->class_type_id = $request->input('class_type_id');
        $cat2->student_id = $request->input('student_id');
        $cat2->subject_id = $request->input('subject_id');
        $cat2->teacher_id = $request->input('teacher_id');
        $cat2->score = $request->input('score');
        $cat2->save();
    }

     public function updateCat2(Request $request,  $id, array $data)
     {
      $cat2 = Cat2::find($id);

        $cat2->class_type_id = $request->input('class_type_id');
        $cat2->student_id = $request->input('student_id');
        $cat2->subject_id = $request->input('subject_id');
        $cat2->teacher_id = $request->input('teacher_id');
        $cat2->score = $request->input('score');
        $cat2->update();
     }

     public function removeCat2($id)
     {
      $cat2 = Cat2::find($id);

        $cat2 = $cat2->delete();
     }
}