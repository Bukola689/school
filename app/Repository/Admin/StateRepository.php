<?php

namespace App\Repository\Admin;

use App\Models\State;
use Illuminate\Http\Request;

class  StateRepository implements IStateRepository
{
    public function saveState(Request $request, array $data)
    {
        $state = new State;
        $state->name = $request->input('name');
        $state->save();
    }

     public function updateState(Request $request, State $state, array $data)
     {
        $state->name = $request->input('name');
        $state->update();
     }

     public function removeState(State $state)
     {
        $state = $state->delete();
     }
}