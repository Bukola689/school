<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StudentProfileController extends Controller
{
    public function studentProfile(Request $request)
    {

       $id = Auth::id();

      $studentProfile = Student::where('id', $id)->get();

      return response()->json([
        'status' => true,
        'studentProfile' => $studentProfile
      ]);
        
    }

    public function updateStudent(Request $request)
    { 

      $request->validate([

        'first_name' => 'required',
        'last_name' => 'required',
        'age' => 'required|min:1',
        'occupation_id' => 'required',
        'd_o_b' => 'required',
        'gender' => 'required',
        'phone_number' => 'required',
        'country_id' => 'required',
        'state_id' => 'required',
        'local_government_id' => 'required',
        'image' => 'required',
        'address' => 'required',
        'parent_firstName' => 'required',
        'parent_lastName' => 'required',
        'parent_address' => 'required',
      ]);

     // dd($request->all());

        $student = $request->user()->student;

         if( $request->hasFile('image')) {
  
         $image = $request->image;
  
         $originalName = $image->getClientOriginalName();
    
         $image_new_name = 'image-' .time() .  '-' .$originalName;
    
         $image->move('students/image', $image_new_name);
  
        $student->image = 'students/image/' . $image_new_name;
      }

      $student->user_id = Auth::user()->id;
      $student->first_name = $request->input('first_name');
      $student->last_name = $request->input('last_name');
      $student->age = $request->input('age');
      $student->occupation_id = $request->input('occupation_id');
      $student->gender = $request->input('gender');
      $student->d_o_b = $request->input('d_o_b');
      $student->phone_number = $request->input('phone_number');
      $student->country_id = $request->input('country_id');
      $student->state_id = $request->input('state_id');
      $student->local_government_id = $request->input('local_government_id');
      $student->address = $request->input('address');
      $student->parent_firstName = $request->input('parent_firstName');
      $student->parent_lastName = $request->input('parent_lastName');
      $student->parent_address = $request->input('parent_address');
      $student->update();

        return response()->json([
            'status' => true,
            'message' => 'Student Profile Updated Suucessfully !'
        ]);
    }

}
