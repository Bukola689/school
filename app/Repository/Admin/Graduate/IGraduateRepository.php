<?php

namespace App\Repository\Admin\Graduate;

use App\Models\Graduate;
use Illuminate\Http\Request;

interface IGraduateRepository
{
    public function saveGraduate(Request $request, array $data);

     public function updateGraduate(Request $request, Graduate $graduate, array $data);

     public function removeGraduate(Graduate $graduate);
}