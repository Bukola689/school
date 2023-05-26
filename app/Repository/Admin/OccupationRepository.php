<?php

namespace App\Repository\Admin;

use App\Models\Occupation;
use Illuminate\Http\Request;

class OccupationRepository implements IOccupationRepository
{
    public function saveOccupation(Request $request, array $data)
    {
        $occupation = new Occupation;
        $occupation->name = $request->input('name');
        $occupation->save();
    }

     public function updateOccupation(Request $request, Occupation $occupation, array $data)
     {
        $occupation->name = $request->input('name');
        $occupation->update();
     }

     public function removeOccupation(Occupation $occupation)
     {
        $occupation = $occupation->delete();
     }
}

?>