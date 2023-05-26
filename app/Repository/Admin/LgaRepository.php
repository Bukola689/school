<?php

namespace App\Repository\Admin;

use App\Models\LocalGovernment;
use Illuminate\Http\Request;

class LgaRepository implements ILgaRepository
{
    public function saveLocalGovernment(Request $request, array $data)
    {
        $localGovernment = new LocalGovernment;
        $localGovernment->name = $request->input('name');
        $localGovernment->save();
    }

     public function updateLocalGovernment(Request $request, LocalGovernment $localGovernment, array $data)
     {
        $localGovernment->name = $request->input('name');
        $localGovernment->update();

     }

     public function removeLocalGovernment(LocalGovernment $localGovernment)
     {
        $localGovernment = $localGovernment->delete();
     }
}