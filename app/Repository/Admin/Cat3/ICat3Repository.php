<?php

namespace App\Repository\Admin\Cat3;

use App\Models\Cat3;
use Illuminate\Http\Request;

interface Icat3Repository
{
    public function saveCat3(Request $request, array $data);

     public function updateCat3(Request $request, Cat3 $cat3, array $data);

     public function removeCat3(Cat3 $cat3);
}