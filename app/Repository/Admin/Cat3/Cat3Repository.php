<?php

namespace App\Repository\Admin\Cat3;

use App\Models\Cat3;
use Illuminate\Http\Request;

class Cat3Repository implements ICat3Repository
{
    public function saveCat3(Request $request, array $data)
    {
        $cat3 = new Cat3();
        $cat3->class_type_id = $request->input('class_type_id');
        $cat3->student_id = $request->input('student_id');
        $cat3->subject_id = $request->input('subject_id');
        $cat3->teacher_id = $request->input('teacher_id');
        $cat3->score = $request->input('score');
        $cat3->save();
    }

     public function updateCat3(Request $request, $id, array $data)
     {
        $cat3 = Cat3::find($id);

        $cat3->class_type_id = $request->input('class_type_id');
        $cat3->student_id = $request->input('student_id');
        $cat3->subject_id = $request->input('subject_id');
        $cat3->teacher_id = $request->input('teacher_id');
        $cat3->score = $request->input('score');
        $cat3->update();
     }

     public function removeCat3($id)
     {
        $cat3 = Cat3::find($id);

        $cat3 = $cat3->delete();
     }
}