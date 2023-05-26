<?php

namespace App\Repository\Admin\Marksheet;

use App\Models\MarkSheet;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MarksheetRepository implements IMarksheetRepository
{
   public function saveMarksheet(Request $request, array $data)
    {
        $markSheet = new MarkSheet();
        $markSheet->term_id = $request->input('term_id');
        $markSheet->class_type_id = $request->input('class_type_id');
        $markSheet->student_id = $request->input('student_id');
        $markSheet->subject_id = $request->input('subject_id');
        $markSheet->session_id = $request->input('session_id');
        $markSheet->teacher_id = $request->input('teacher_id');
        $markSheet->mark_date = Carbon::now();
        $markSheet->cat1_id = $request->input('cat1_id');
        $markSheet->cat2_id = $request->input('cat2_id');
        $markSheet->cat3_id = $request->input('cat3_id');
        $markSheet->examination_id = $request->input('examination_id');
        $markSheet->save();
    }

    public function updateMarksheet(Request $request,  $id, array $data)
     {
      $markSheet = MarkSheet::find($id);

        $markSheet->term_id = $request->input('term_id');
        $markSheet->class_type_id = $request->input('class_type_id');
        $markSheet->student_id = $request->input('student_id');
        $markSheet->subject_id = $request->input('subject_id');
        $markSheet->session_id = $request->input('session_id');
        $markSheet->teacher_id = $request->input('teacher_id');
        $markSheet->mark_date = Carbon::now();
        $markSheet->cat1_id = $request->input('cat1_id');
        $markSheet->cat2_id = $request->input('cat2_id');
        $markSheet->cat3_id = $request->input('cat3_id');
        $markSheet->examination_id = $request->input('examination_id');
        $markSheet->update();


     }

     public function removeMarksheet($id)
     {
      $markSheet = MarkSheet::find($id);

      $markSheet = $markSheet->delete();
     }
}