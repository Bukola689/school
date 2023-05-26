<?php

namespace App\Http\Controllers;

use App\Events\UserRegistered;
use App\Models\User;
use App\Notifications\RegisterdNotification;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $data = User::first();

        $user = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required' 
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token  = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user'=>$user,
            'token'=>$token,
        ];

        $when = Carbon::now()->addSeconds(10);

        $data->notify((new RegisterdNotification($user))->delay($when));

        event(new Registered($user));

        event(new UserRegistered($user));

        cache()->forget('user:all');

        return response($response, 201);
    }
}
