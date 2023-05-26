<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repository\Admin\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class UserController extends Controller
{
    public $user;

    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }


    public function index()
    {
        $users =  Cache::remember('users', 60, function () {
            return User::orderBy('created_at', 'DESC')->paginate(5);
        }); 

        if($users->isEmpty()) {
            return response()->json('users Is Empty');
        }
        
        return UserResource::collection($users);
    }

    public function store(StoreUserRequest $request)
    {
       $data = $request->all();

       $this->user->saveUser($request, $data);

       cache()->forget('user:all');

        return response()->json([
            'message' => 'User Saved Successfully'
        ]);

    }

    public function show($id)
    {
        $user = User::find($id);

        if(! $user) {
            return response()->json('user Not Found');
        }

        $userShow = cache()->rememberForever('user:'. $user->id, function () use($user) {
            return $user;
        });

        return new UserResource($userShow);
    }

    public function update(UpdateUserRequest $request, $id)
    { 
        $user = User::find($id);

        if(! $user) {
            return response()->json('user Not Found');
        }

       $data = $request->all();

       $this->user->updateUser($request, $user, $data);

       cache()->forget('user:'. $user->id);
       cache()->forget('user:all');

        return response()->json([
            'status' => 'User Updated Successfully'
        ]);

    }

    public function destroy($id)
    {
        $user = User::find($id);

        if(! $user) {
            return response()->json('user Not Found');
        }

        $this->user->removeUser($user);

        cache()->forget('user:'. $user->id);
        cache()->forget('user:all');
        
        return response()->json([
            'status' => 'User Deleted Successfully ',
        ]);      
    }
}
