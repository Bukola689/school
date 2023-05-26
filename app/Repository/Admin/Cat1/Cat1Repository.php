<?php

namespace App\Repository\Admin\Cat1;

use App\Models\Cat1;
use Illuminate\Http\Request;

class Cat1Repository implements ICat1Repository
{
    public function saveCat1(Request $request, array $data)
    {
        $cat1 = new Cat1;
        $cat1->class_type_id = $request->input('class_type_id');
        $cat1->student_id = $request->input('student_id');
        $cat1->subject_id = $request->input('subject_id');
        $cat1->teacher_id = $request->input('teacher_id');
        $cat1->score = $request->input('score');
        $cat1->save();
    }

     public function updateCat1(Request $request,  $id, array $data)
     {
      $cat1 = Cat1::find($id);

        $cat1->class_type_id = $request->input('class_type_id');
        $cat1->student_id = $request->input('student_id');
        $cat1->subject_id = $request->input('subject_id');
        $cat1->teacher_id = $request->input('teacher_id');
        $cat1->score = $request->input('score');
        $cat1->update();
     }

     public function removeCat1($id)
     {
      $cat1 = Cat1::find($id);

      $cat1 = $cat1->delete();
     }
}