<?php

namespace App\Repository\Admin\Attendance;

use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceRepository implements IAttendanceRepository
{
   public function saveAttendance(Request $request, array $data)
    {
      $attendance = new Attendance;
      $attendance->student_id = $request->input('student_id');
      $attendance->class_type_id = $request->input('class_type_id');
      $attendance->teacher_id = $request->input('teacher_id');
      $attendance->status = 'absent';
      $attendance->att_date = Carbon::now();
      $attendance->save();
    }

    public function updateAttendance(Request $request,  $id, array $data)
     {
      $attendance = Attendance::find($id);

      $attendance->student_id = $request->input('student_id');
      $attendance->class_type_id= $request->input('class_type_id');
      $attendance->teacher_id = $request->input('teacher_id');
      $attendance->att_date = 'absent';
      $attendance->att_date = Carbon::now();
      $attendance->update();
     }

     public function removeAttendance($id)
     {
      $attendance = Attendance::find($id);

        $attendance = $attendance->delete();
     }
}