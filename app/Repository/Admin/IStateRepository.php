<?php

namespace App\Repository\Admin;

use App\Models\State;
use Illuminate\Http\Request;

interface IStateRepository
{
    public function saveState(Request $request, array $data);

     public function updateState(Request $request, State $state, array $data);

     public function removeState(State $state);
}