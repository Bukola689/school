<?php

namespace App\Repository\Admin\StaffRoom;

use App\Models\StaffRoom;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StaffRoomRepository implements IStaffRoomRepository
{
   public function saveStaffRoom(Request $request, array $data)
    {
       $staffRoom = new StaffRoom;
       $staffRoom->teacher_id = $request->input('teacher_id');
       $staffRoom->room_no = $request->input('room_no');
       $staffRoom->save();
    }

    public function updateStaffRoom(Request $request, StaffRoom $staffRoom, array $data)
     {
        $staffRoom->teacher_id = $request->input('teacher_id');
        $staffRoom->room_no = $request->input('room_no');
        $staffRoom->update();
     }

     public function removeStaffRoom(StaffRoom $staffRoom)
     {
        $staffRoom = $staffRoom->delete();
     }
}