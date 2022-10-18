<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use App\Models\ClassType;
use App\Http\Resources\ClassTypeResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StudentClassTypeController extends Controller
{
    public function getClassType()
    {
      $id = Auth::id();
      
        $classtype = ClassType::with('myClass')->where('id', $id)->get();

        return response()->json([
            'status' => true,
            'classtype' => $classtype
        ]);
      
    }

}
