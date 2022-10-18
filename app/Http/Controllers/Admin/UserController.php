<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return UserResource::collection($users);
    }

    public function store(StoreUserRequest $request)
    {
        // $image = $request->image;
      
        // $originalName = $image->getClientOriginalName();
    
        // $image_new_name = 'image-' .time() .  '-' .$originalName;
    
        // $image->move('users/image', $image_new_name);

        $user = new User;
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

        return new UserResource($user);

    }

    public function show(User $user)
    {
        return new UserResource($user);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
   

        $user->name = $request->input('name');
        $user->update();


        return new UserResource($user);

    }

    public function destroy(User $user)
    {
        $user = $user->delete();

        return response()->json([
            'status' => 'User Deleted Successfully ',
        ]);      
    }
}
