<?php

namespace App\Repository\Admin;

use App\Models\Occupation;
use Illuminate\Http\Request;

interface IOccupationRepository
{
    public function saveOccupation(Request $request, array $data);

     public function updateOccupation(Request $request, Occupation $occupation, array $data);

     public function removeOccupation(Occupation $occupation);
}