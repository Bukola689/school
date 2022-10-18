<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function updateProfile(updateUserRequest $request,User $profile)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'image' => 'required'
            //'email' => 'required',
        ]);

        $profile = $request->user();

        if( $request->hasFile('image')) {
  
            $image = $request->image;
  
            $originalName = $image->getClientOriginalName();
    
            $image_new_name = 'image-' .time() .  '-' .$originalName;
    
            $image->move('profiles/image', $image_new_name);
  
            $profile->image = 'profiles/image/' . $image_new_name;
      }

      $profile->name = $request->input('name');
      $profile->address = $request->input('address');
      //$profile->email = $request->input('email');
      $profile->update();

      return response()->json([
        'message' => 'Profile updated Successfully',
        'user' => $profile
      ]);

    }

    public function changePassword(Request $request)
    {
       $validator = Validator::make($request->all(), [
        "old_password" => "required",
        "password" => "required",
        "confirm_password" => "required|same:password"
       ]);

       if($validator->fails()) {
        return response()->json(['message'=> 'check your password and try again']);
       }

       $user = $request->user();
       

        if( Hash::check($request->old_password, $user->password)){
            
            $user->update([
                'password' => Hash::make($request->password)
            ]);

           return response()->json([
              'message'=> 'Password Updated Successfully',
           ], 200);

        } else {
            return response()->json([
                'message' => 'check your password and try again  !'
            ]);
        }
    }
}
