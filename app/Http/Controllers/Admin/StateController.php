<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\State;
use App\Http\Resources\StateResource;
use App\Http\Requests\StoreStateRequest;
use App\Http\Requests\UpdateStateRequest;
use App\Repository\Admin\StateRepository;

class StateController extends Controller
{
    public $state;

    public function __construct(StateRepository $state)
    {
        $this->state = $state;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = cache()->rememberForever('state:all', function () {
            return State::orderBy('created_at', 'DESC')->get();
        });

        if($states->isEmpty()) {
            return response()->json('State Is Empty');
        }

        return StateResource::collection($states);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStateRequest $request)
    {
      $data = $request->all();

      $this->state->saveState($request, $data);

      cache()->forget('state:all');

        return response()->json([
            'message' => 'State Saved Successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $state = State::find($id);

        if(! $state) {
            return response()->json('State Not Found');
        }

        $stateShow = cache()->rememberForever('state:'. $state->id, function () use($state) {
            return $state;
        });

        return new StateResource($stateShow);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function edit(State $state)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStateRequest  $request
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStateRequest $request, $id)
    {
        $state = State::find($id);

        if(! $state) {
            return response()->json('State Not Found');
        }
        $data = $request->all();

        $this->state->updateState($request, $state, $data);

        cache()->forget('state:'. $state->id);
        cache()->forget('state:all');
  
          return response()->json([
              'message' => 'State Updated Successfully'
          ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $state = State::find($id);

        if(! $state) {
            return response()->json('State Not Found');
        }

        $this->state->removeState($state);

        cache()->forget('state:'. $state->id);
        cache()->forget('state:all');

        return response()->json([
            'message' => 'State deleted successfully !'
        ]);
    }
}
