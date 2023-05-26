<?php

namespace App\Repository\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserRepository implements IUserRepository
{
    public function saveUser(Request $request, array $data)
    {
         // $image = $request->image;
      
        // $originalName = $image->getClientOriginalName();
    
        // $image_new_name = 'image-' .time() .  '-' .$originalName;
    
        // $image->move('users/image', $image_new_name);

        $user = new User();
        $user->name = $request->input('name');
        // $user->occupation_id = $request->input('occupation_id');
        // $user->gender = $request->input('gender');
        // $user->d_o_b = $request->input('d_o_b');
        // $user->phone_number = $request->input('phone_number');
       // $user->image = 'users/image/' . $image_new_name;
        // $user->country_id = $request->input('country_id');
        // $user->state_id = $request->input('state_id');
        // $user->local_government_id = $request->input('local_government_id');
        // $user->address = $request->input('address');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->password);
        $user->save();
    }

    public function updateUser(Request $request, User $user, array $data)
    {
        $user->name = $request->input('name');
        $user->update();
    }

    public function removeUser(User $user)
    {
        $user = $user->delete();
    }
}