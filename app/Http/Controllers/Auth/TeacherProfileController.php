<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;

use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TeacherProfileController extends Controller
{
    public function viewProfile()
    {
        $id = Auth::id();

        $teacherProfile = Teacher::where('id', $id)->get();
  
        return response()->json([
          'status' => true,
          'teacherProfile' => $teacherProfile
        ]);
    }

    public function updateTeacher(Request $request)
    {

        $request->validate([
        
            'first_name' => 'required',
            'last_name' => 'required',
            'age' => 'required',
            'occupation_id' => 'required',
            'd_o_b' => 'required',
            'gender' => 'required',
            'phone_number' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'local_government_id' => 'required',
            'image' => 'required',
            'address' => 'required',
            'qualification' => 'required'
        ]);


        $teacher = $request->user()->teacher;

             if( $request->hasFile('image')) {
  
            $image = $request->image;
  
            $originalName = $image->getClientOriginalName();
    
            $image_new_name = 'image-' .time() .  '-' .$originalName;
    
            $image->move('teachers/image', $image_new_name);
  
            $teacher->image = 'teachers/image/' . $image_new_name;
      }

     

      //$teacher->user_id = $request->input('user_id');
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

        return response()->json([
            'status' => true,
            'message' => 'Teacher Profile Updated Suucessfully !'
        ]);
    }

    public function deleteProfile()
    {
        $id = Auth::id();

        $teacherProfile = Teacher::where('id', $id)->get();
        $teacherProfile->delete();

        return response()->json([
            'status' => true,
            'message' => ' Teacher Profile Deleted Successfully !'
        ]);
    }
}
