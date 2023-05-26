<?php

namespace App\Repository\Admin\Examination;

use App\Models\Examination;
use Illuminate\Http\Request;

class ExaminationRepository implements IExaminationRepository
{
   public function saveExamination(Request $request, array $data)
    {
      $examination = new Examination;
      $examination->class_type_id = $request->input('class_type_id');
      $examination->teacher_id = $request->input('teacher_id');
      $examination->subject_id = $request->input('subject_id');
      $examination->student_id = $request->input('student_id');
      $examination->mark = $request->input('mark');
      $examination->save();
    }

    public function updateExamination(Request $request, $id, array $data)
     {
      $examination = Examination::find($id);

      $examination->class_type_id = $request->input('class_type_id');
      $examination->teacher_id = $request->input('teacher_id');
      $examination->subject_id = $request->input('subject_id');
      $examination->student_id = $request->input('student_id');
      $examination->mark = $request->input('mark');
      $examination->update();

     }

     public function removeExamination($id)
     {
        $examination = Examination::find($id);

        $examination = $examination->delete();
     }
}