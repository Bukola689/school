<?php

namespace App\Repository\Admin\Hostel;

use App\Models\Hostel;
use Illuminate\Http\Request;

class HostelRepository implements IHostelRepository
{
   public function saveHostel(Request $request, array $data)
    {
      $hostel = new Hostel;
      $hostel->student_id = $request->input('student_id');
      $hostel->block = $request->input('block');
      $hostel->room_no = $request->input('room_no');
      $hostel->save();

    }

    public function updateHostel(Request $request, $id, array $data)
     {
      $hostel = Hostel::find($id);

       $hostel->student_id = $request->input('student_id');
       $hostel->block = $request->input('block');
       $hostel->room_no = $request->input('room_no');
       $hostel->update();
     }

     public function removeHostel($id)
     {
      $hostel = Hostel::find($id);

       $hostel = $hostel->delete();
     }
}