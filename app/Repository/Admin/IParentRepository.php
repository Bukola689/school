<?php

namespace App\Repository\Admin;

use App\Models\MyParent;
use Illuminate\Http\Request;

interface IParentRepository
{
    public function saveParent(Request $request, array $data);

      public function updateParent(Request $request, MyParent $parent, array $data);

      public function removeParent(MyParent $parent);
}