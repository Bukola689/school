<?php

namespace App\Repository\Admin\ReportCard;

use App\Models\ReportCard;
use Illuminate\Http\Request;

class ReportCardRepository implements IReportCardRepository
{
   public function saveReportCard(Request $request, array $data)
    {
        $reportCard = new ReportCard();
        $reportCard->class_type_id = $request->input('class_type_id');
        $reportCard->term_id = $request->input('term_id');
        $reportCard->subject_id = $request->input('subject_id');
        $reportCard->teacher_id = $request->input('teacher_id');
        $reportCard->session_id = $request->input('session_id');
        $reportCard->student_id = $request->input('student_id');
        $reportCard->cat1_id = $request->input('cat1_id');
        $reportCard->cat2_id = $request->input('cat2_id');
        $reportCard->cat3_id = $request->input('cat3_id');
        $reportCard->examination_id = $request->input('examination_id');
        $reportCard->position = $request->input('position');
        $reportCard->percentage = $request->input('percentage');
        $reportCard->comments = $request->input('comments');
        $reportCard->save();
    }

    public function updateReportCard(Request $request, ReportCard $reportCard, array $data)
     {
      $reportCard->class_type_id = $request->input('class_type_id');
      $reportCard->term_id = $request->input('term_id');
      $reportCard->subject_id = $request->input('subject_id');
      $reportCard->teacher_id = $request->input('teacher_id');
      $reportCard->session_id = $request->input('session_id');
      $reportCard->student_id = $request->input('student_id');
      $reportCard->cat1_id = $request->input('cat1_id');
      $reportCard->cat2_id = $request->input('cat2_id');
      $reportCard->cat3_id = $request->input('cat3_id');
      $reportCard->examination_id = $request->input('examination_id');
      $reportCard->position = $request->input('position');
      $reportCard->percentage = $request->input('percentage');
      $reportCard->comments = $request->input('comments');
      $reportCard->update();
     }

     public function removeReportCard(ReportCard $reportCard)
     {
      $reportCard = $reportCard->delete();
     }
}