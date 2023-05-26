<?php

namespace App\Repository\Admin;

use App\Models\ClassType;
use Illuminate\Http\Request;

class ClassTypeRepository implements IClassTypeRepository
{
    public function saveClassType(Request $request, array $data)
    {
        $classType = new ClassType;
        $classType->my_class_id = $request->input('my_class_id');
        $classType->name = $request->input('name');
        $classType->save();
    }

     public function updateClassType(Request $request, ClassType $classType, array $data)
     {
        $classType->my_class_id = $request->input('my_class_id');
        $classType->name = $request->input('name');
        $classType->update();
     }

     public function removeClassType(ClassType $classType)
     {
        $classType = $classType->delete();
     }
}