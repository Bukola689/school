<?php

namespace App\Repository\Admin\Promotion;

use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionRepository implements IPromotionRepository
{
   public function savePromotion(Request $request, array $data)
    {
      $promotion = new Promotion;
      $promotion->class_type_id = $request->input('class_type_id');
      $promotion->teacher_id = $request->input('teacher_id');
      $promotion->session_id = $request->input('session_id');
      $promotion->student_id = $request->input('student_id');
      $promotion->save();
    }

    public function updatePromotion(Request $request, Promotion $promotion, array $data)
     {
       $promotion->class_type_id = $request->input('class_type_id');
       $promotion->teacher_id = $request->input('teacher_id');
       $promotion->session_id = $request->input('session_id');
       $promotion->student_id = $request->input('student_id');
       $promotion->update();
     }

     public function removePromotion(Promotion $promotion)
     {
       $promotion = $promotion->delete();
     }
}