<?php

namespace App\Repository\Admin;

use App\Models\User;
use Illuminate\Http\Request;

interface IUserRepository
{
    public function saveUser(Request $request, array $data);

    public function updateUser(Request $request, User $user, array $data);

    public function removeUser(User $user);
}