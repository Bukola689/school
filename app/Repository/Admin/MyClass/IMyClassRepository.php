<?php

namespace App\Repository\Admin\MyClass;

use App\Models\MyClass;
use Illuminate\Http\Request;

interface IMyClassRepository
{
    public function saveClass(Request $request, array $data);

     public function updateClass(Request $request, MyClass $myClass, array $data);

     public function removeClass(MyClass $myClass);
}