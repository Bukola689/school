<?php

namespace App\Repository\Admin;

use App\Models\ClassType;
use Illuminate\Http\Request;

interface IClassTypeRepository
{
    public function saveClassType(Request $request, array $data);

     public function updateClassType(Request $request, ClassType $classType, array $data);

     public function removeClassType(ClassType $classtype);
}