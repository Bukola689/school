<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ChangePasswordController extends Controller
{
    public function changePassword(Request $request)
    {
       $validator = validator::make($request->all(), [
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
