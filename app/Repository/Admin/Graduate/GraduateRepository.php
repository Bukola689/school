<?php

namespace App\Repository\Admin\Graduate;

use App\Models\Graduate;
use Illuminate\Http\Request;

class GraduateRepository implements IGraduateRepository
{
   public function saveGraduate(Request $request, array $data)
    {
        $graduate = new Graduate;
        $graduate->class_type_id = $request->input('class_type_id');
        $graduate->term_id = $request->input('term_id');
        $graduate->session_id = $request->input('session_id');
        $graduate->student_id = $request->input('student_id');
        $graduate->save();
    }

    public function updateGraduate(Request $request, $id, array $data)
     {
        $graduate = Graduate::find($id);

        $graduate->class_type_id = $request->input('class_type_id');
        $graduate->term_id = $request->input('term_id');
        $graduate->session_id = $request->input('session_id');
        $graduate->student_id = $request->input('student_id');
        $graduate->update();
     }

     public function removeGraduate($id)
     {
      $graduate = Graduate::find($id);

        $graduate = $graduate->delete();
     }
}