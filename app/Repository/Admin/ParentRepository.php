<?php

namespace App\Repository\Admin;

use App\Models\MyParent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParentRepository implements IParentRepository
{
    public function saveParent(Request $request, array $data)
    {
        $image = $request->image;
      
        $originalName = $image->getClientOriginalName();
    
        $image_new_name = 'image-' .time() .  '-' .$originalName;
    
        $image->move('parents/image', $image_new_name);

        $parent = new MyParent();
        $parent->user_id = Auth::user()->id;
        $parent->first_name = $request->input('first_name');
        $parent->last_name = $request->input('last_name');
        $parent->age = $request->input('age');
        $parent->occupation_id = $request->input('occupation_id');
        $parent->gender = $request->input('gender');
        $parent->d_o_b = $request->input('d_o_b');
        $parent->phone_number = $request->input('phone_number');
        $parent->image = 'parents/image/' . $image_new_name;
        $parent->country_id = $request->input('country_id');
        $parent->state_id = $request->input('state_id');
        $parent->local_government_id = $request->input('local_government_id');
        $parent->address = $request->input('address');
        $parent->save();
    }

      public function updateParent(Request $request, MyParent $parent, array $data)
      {
        if( $request->hasFile('image')) {
  
            $image = $request->image;
  
            $originalName = $image->getClientOriginalName();
    
            $image_new_name = 'image-' .time() .  '-' .$originalName;
    
            $image->move('parents/image', $image_new_name);
  
            $parent->image = 'parents/image/' . $image_new_name;
      }

      $parent->user_id = Auth::user()->id;
      $parent->first_name = $request->input('first_name');
      $parent->last_name = $request->input('last_name');
      $parent->age = $request->input('age');
      $parent->occupation_id = $request->input('occupation_id');
      $parent->gender = $request->input('gender');
      $parent->d_o_b = $request->input('d_o_b');
      $parent->phone_number = $request->input('phone_number');
      $parent->country_id = $request->input('country_id');
      $parent->state_id = $request->input('state_id');
      $parent->local_government_id = $request->input('local_government_id');
      $parent->address = $request->input('address');
      $parent->update();
      }

     public function removeParent(MyParent $parent)
     {
        $parent = $parent->delete();
     }
}