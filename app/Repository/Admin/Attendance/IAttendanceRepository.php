<?php

namespace App\Repository\Admin\Attendance;

use App\Models\Attendance;
use Illuminate\Http\Request;

interface IAttendanceRepository
{
    public function saveAttendance(Request $request, array $data);

     public function updateAttendance(Request $request, Attendance $attendance, array $data);

     public function removeAttendance(Attendance $attendance);
}