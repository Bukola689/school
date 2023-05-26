<?php

namespace App\Repository\Admin\StaffRoom;


use App\Models\StaffRoom;
use Illuminate\Http\Request;

interface IStaffRoomRepository
{
    public function saveStaffRoom(Request $request, array $data);

     public function updateStaffRoom(Request $request, StaffRoom $staffRoom, array $data);

     public function removeStaffRoom(StaffRoom $staffRoom);
}