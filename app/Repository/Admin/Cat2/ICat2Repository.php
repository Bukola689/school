<?php

namespace App\Repository\Admin\Cat2;

use App\Models\Cat2;
use Illuminate\Http\Request;

interface ICat2Repository
{
    public function saveCat2(Request $request, array $data);

     public function updateCat2(Request $request, Cat2 $cat2, array $data);

     public function removeCat2(Cat2 $cat2);
}