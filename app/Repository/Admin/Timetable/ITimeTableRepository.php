<?php

namespace App\Repository\Admin\TimeTable;

use App\Models\TimeTable;
use Illuminate\Http\Request;

interface ITimeTableRepository
{
    public function saveTimetable(Request $request, array $data);

     public function updateTimeTable(Request $request, TimeTable $timeTable, array $data);

     public function removeTimeTable(TimeTable $timeTable);
}