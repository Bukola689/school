<?php

namespace App\Repository\Admin;

use App\Models\LocalGovernment;
use Illuminate\Http\Request;

interface ILgaRepository
{
    public function saveLocalGovernment(Request $request, array $data);

     public function updateLocalGovernment(Request $request, LocalGovernment $localGovernment, array $data);

     public function removeLocalGovernment(LocalGovernment $localGovernment);
}