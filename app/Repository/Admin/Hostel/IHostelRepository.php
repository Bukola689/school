<?php

namespace App\Repository\Admin\Hostel;

use App\Models\Hostel;
use Illuminate\Http\Request;

interface IHostelRepository
{
    public function saveHostel(Request $request, array $data);

     public function updateHostel(Request $request, Hostel $hostel, array $data);

     public function removeHostel(Hostel $hostel);
}