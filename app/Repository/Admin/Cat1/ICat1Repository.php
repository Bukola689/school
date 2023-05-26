<?php

namespace App\Repository\Admin\Cat1;

use App\Models\Cat1;
use Illuminate\Http\Request;

interface Icat1Repository
{
    public function saveCat1(Request $request, array $data);

     public function updateCat1(Request $request, Cat1 $cat1, array $data);

     public function removeCat1(Cat1 $cat1);
}