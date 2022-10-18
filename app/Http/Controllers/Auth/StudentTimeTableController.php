<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use App\Models\TimeTable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StudentTimeTableController extends Controller
{
   public function studentTT($id)
   {
      $classtt = TimeTable::with('classType')->find($id);

      return response()->json([
        'status' => $classtt
      ]);
   }
}
