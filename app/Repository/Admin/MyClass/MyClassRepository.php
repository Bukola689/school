<?php

namespace App\Repository\Admin\MyClass;

use App\Models\MyClass;
use Illuminate\Http\Request;

class MyClassRepository implements IMyClassRepository
{
    public function saveClass(Request $request, array $data)
    {
        $myClass = new MyClass;
        $myClass->name = $request->input('name');
        $myClass->save();
    }

     public function updateClass(Request $request, MyClass $myClass, array $data)
     {
        $myClass->name = $request->input('name');
        $myClass->update();
     }

     public function removeClass(MyClass $myClass)
     {
        $class = $myClass->delete();
     }
}