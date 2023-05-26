<?php

namespace App\Repository\Admin;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherRepository implements ITeacherRepository
{
    public function saveTeacher(Request $request, array $data)
    {
        $image = $request->image;
      
        $originalName = $image->getClientOriginalName();
    
        $image_new_name = 'image-' .time() .  '-' .$originalName;
    
        $image->move('teachers/image', $image_new_name);

        $teacher = new Teacher;
        $teacher->user_id = Auth::user()->id;
        $teacher->first_name = $request->input('first_name');
        $teacher->last_name = $request->input('last_name');
        $teacher->age = $request->input('age');
        $teacher->occupation_id = $request->input('occupation_id');
        $teacher->gender = $request->input('gender');
        $teacher->d_o_b = $request->input('d_o_b');
        $teacher->phone_number = $request->input('phone_number');
        $teacher->image = 'teachers/image/' . $image_new_name;
        $teacher->country_id = $request->input('country_id');
        $teacher->state_id = $request->input('state_id');
        $teacher->local_government_id = $request->input('local_government_id');
        $teacher->address = $request->input('address');
        $teacher->qualification = $request->input('qualification');
        $teacher->save();

    }

     public function updateTeacher(Request $request, Teacher $teacher, array $data)
     {
        if( $request->hasFile('image')) {
  
            $image = $request->image;
  
            $originalName = $image->getClientOriginalName();
    
            $image_new_name = 'image-' .time() .  '-' .$originalName;
    
            $image->move('teachers/image', $image_new_name);
  
            $teacher->image = 'teachers/image/' . $image_new_name;
      }

      $teacher->user_id = Auth::user()->id;
      $teacher->first_name = $request->input('first_name');
      $teacher->last_name = $request->input('last_name');
      $teacher->age = $request->input('age');
      $teacher->occupation_id = $request->input('occupation_id');
      $teacher->gender = $request->input('gender');
      $teacher->d_o_b = $request->input('d_o_b');
      $teacher->phone_number = $request->input('phone_number');
      $teacher->country_id = $request->input('country_id');
      $teacher->state_id = $request->input('state_id');
      $teacher->local_government_id = $request->input('local_government_id');
      $teacher->address = $request->input('address');
      $teacher->qualification = $request->input('qualification');
      $teacher->update();
     }

     public function removeTeacher(Teacher $teacher)
     {
        $teacher = $teacher->delete();
     }
}