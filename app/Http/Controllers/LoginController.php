<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

      $user = User::where('email', $data['email'])->first();

      if(!$user || !Hash::check($data['password'], $user->password))
      {
          return response(['message'=>'invalid credentials'], 401);
      } else {
        $token  = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user'=>$user,
            'token'=>$token,
        ];

        return response($response, 200);
      }
    }
}
