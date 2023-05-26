<?php

namespace App\Repository\Admin;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentRepository implements IStudentRepository
{
    public function saveStudent(Request $request, array $data)
    {
        $image = $request->image;
      
        $originalName = $image->getClientOriginalName();
    
        $image_new_name = 'image-' .time() .  '-' .$originalName;
    
        $image->move('students/image', $image_new_name);

        $student = new Student();
        $student->user_id = Auth::user()->id;
        $student->first_name = $request->input('first_name');
        $student->last_name = $request->input('last_name');
        $student->age = $request->input('age');
        $student->occupation_id = $request->input('occupation_id');
        $student->gender = $request->input('gender');
        $student->d_o_b = $request->input('d_o_b');
        $student->phone_number = $request->input('phone_number');
        $student->image = 'students/image/' . $image_new_name;
        $student->country_id = $request->input('country_id');
        $student->state_id = $request->input('state_id');
        $student->local_government_id = $request->input('local_government_id');
        $student->parent_firstName = $request->input('parent_firstName');
        $student->parent_lastName = $request->input('parent_lastName');
        $student->parent_address = $request->input('parent_address');
        $student->address = $request->input('address');
        $student->save();
    }

       public function updateStudent(Request $request, Student $student, array $data)
       {
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
      $student->parent_firstName = $request->input('parent_firstName');
      $student->parent_lastName = $request->input('parent_lastName');
      $student->parent_address = $request->input('parent_address');
      $student->address = $request->input('address');
      $student->update();

     }

       public function removeStudent(Student $student)
       {
          $this->student->removeStudent($student);

          return response()->json([
            'message' => 'Student Remove Successfully'
          ]);
       }
}