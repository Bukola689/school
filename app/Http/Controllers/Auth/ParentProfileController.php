<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;

use App\Models\MyParent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ParentProfileController extends Controller
{
    public function parentProfile()
    {
        $id = Auth::id();

        $parentProfile = MyParent::where('id', $id)->get();
  
        return response()->json([
          'status' => true,
          'parentProfile' => $parentProfile
        ]);
    }

    public function updateParentr(Request $request)
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
        ]);

        $parent = $request->user()->parent;

             if( $request->hasFile('image')) {
  
            $image = $request->image;
  
            $originalName = $image->getClientOriginalName();
    
            $image_new_name = 'image-' .time() .  '-' .$originalName;
    
            $image->move('parents/image', $image_new_name);
  
            $parent->image = 'parents/image/' . $image_new_name;
      }

     
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

        return response()->json([
            'status' => true,
            'message' => 'Teacher Profile Updated Suucessfully !'
        ]);
    }

    public function deleteProfile()
    {
        $id = Auth::id();

        $parentProfile = MyParent::where('id', $id)->get();
        $parentProfile->delete();

        return response()->json([
            'status' => true,
            'message' => ' Parent Profile Deleted Successfully !'
        ]);
    }
}
