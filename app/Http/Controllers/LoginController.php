<?php

namespace App\Http\Controllers;

use App\Events\Userlogin;
use App\Models\User;
use App\Notifications\LoginNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $not = User::first();

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

        $when = Carbon::now()->addSeconds(10);

        event(new Userlogin($user));

        $not->notify((new LoginNotification($user))->delay($when));

        cache()->forget('user:all');

        return response($response, 200);
      }
    }
}
