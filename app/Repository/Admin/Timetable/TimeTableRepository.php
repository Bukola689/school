<?php

namespace App\Repository\Admin\TimeTable;

use App\Models\TimeTable;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TimeTableRepository implements ITimeTableRepository
{
    public function saveTimetable(Request $request, array $data)
    {
      $timeTable = new TimeTable;
      $timeTable->class_type_id = $request->input('class_type_id');
      $timeTable->term_id = $request->input('term_id');
      $timeTable->subject_id = $request->input('subject_id');
      $timeTable->teacher_id = $request->input('teacher_id');
      $timeTable->session_id = $request->input('session_id');
      $timeTable->created_at = Carbon::now();;
      $timeTable->save();
    }

     public function updateTimeTable(Request $request, TimeTable $timeTable, array $data)
     {
      $timeTable->class_type_id = $request->input('class_type_id');
      $timeTable->term_id = $request->input('term_id');
      $timeTable->subject_id = $request->input('subject_id');
      $timeTable->teacher_id = $request->input('teacher_id');
      $timeTable->session_id = $request->input('session_id');
      $timeTable->created_at = Carbon::now();
      $timeTable->update();
     }

     public function removeTimeTable(TimeTable $timeTable)
     {
      $timeTable = $timeTable->delete();
     }
}