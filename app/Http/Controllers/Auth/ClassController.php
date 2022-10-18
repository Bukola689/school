<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use App\Models\MyClass;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function viewClass()
    {
        if(Auth::id())
        {
            $myClasses = MyClass::where('id', Auth::id())->get();

            return response()->json([
                'status' => true,
                'myClasses' => $myClasses
            ]);
        } else {
            return response()->json([
                'status' =>false,
                'message' => 'No record found'
            ]);
        }
    }

    public function getClassById($id)
    {
        if(Auth::id())
        {
            $class = MyClass::orderBy('id', $id)->get();

            return response()->json([
                'status' => true,
                'class' => $class
            ]);
        }
    }

}
