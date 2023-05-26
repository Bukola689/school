<?php

namespace App\Repository\Admin\Repeat;

use App\Models\Repeat;
use Illuminate\Http\Request;

class RepeatRepository implements IRepeatRepository
{
   public function saveRepeat(Request $request, array $data)
    {
      $repeat = new Repeat;
      $repeat->class_type_id = $request->input('class_type_id');
      $repeat->teacher_id = $request->input('teacher_id');
      $repeat->session_id = $request->input('session_id');
      $repeat->student_id = $request->input('student_id');
      $repeat->save();

    }

    public function updateRepeat(Request $request, Repeat $repeat, array $data)
     {
       $repeat->class_type_id = $request->input('class_type_id');
       $repeat->teacher_id = $request->input('teacher_id');
       $repeat->session_id = $request->input('session_id');
       $repeat->student_id = $request->input('student_id');
       $repeat->update();
     }

     public function removeRepeat(Repeat $repeat)
     {
       $repeat = $repeat->delete();
     }
}