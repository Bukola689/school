<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Repeat;
use App\Http\Resources\RepeatResource;
use App\Http\Requests\StoreRepeatRequest;
use App\Http\Requests\UpdateRepeatRequest;
use App\Repository\Admin\Repeat\RepeatRepository;

class RepeatController extends Controller
{
    public $repeat;

    public function __construct(RepeatRepository $repeat)
    {
        $this->repeat = $repeat;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $repeats = cache()->rememberForever('repeat:all', function () {
            return Repeat::orderBy('created_at', 'DESC')->get();
        });

        if($repeats->isEmpty()) {
            return response()->json('Repeat Is Empty');
        }

        return RepeatResource::collection($repeats);
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
     * @param  \App\Http\Requests\StoreRepeatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRepeatRequest $request)
    {
        $data = $request->all();

        $this->repeat->saveRepeat($request, $data);

        cache()->forget('repeat:all');

        return response()->json([
            'message' => 'Repeat Saved Successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Repeat  $repeat
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $repeat = Repeat::find($id);

        if(! $repeat) {
            return response()->json('Repeaters Not Found');
        }

        $repeatShow = cache()->rememberForever('repeat:'. $repeat->id, function () use($repeat) {
            return $repeat;
        });

        return new RepeatResource($repeatShow);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Repeat  $repeat
     * @return \Illuminate\Http\Response
     */
    public function edit(Repeat $repeat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRepeatRequest  $request
     * @param  \App\Models\Repeat  $repeat
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRepeatRequest $request, $id)
    {
        $repeat = Repeat::find($id);

        if(! $repeat) {
            return response()->json('Repeaters Not Found');
        }

        $data = $request->all();

        $this->repeat->updateRepeat($request, $repeat, $data);

        cache()->forget('repeat:'. $repeat->id);
        cache()->forget('repeat:all');

        return response()->json([
            'message' => 'Repeat Updated Successfully'
        ]);  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Repeat  $repeat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $repeat = Repeat::find($id);

        if(! $repeat) {
            return response()->json('Repeaters Not Found');
        }

        $this->repeat->removeRepeat($repeat);
        
        cache()->forget('repeat:'. $repeat->id);
        cache()->forget('repeat:all');

        return response()->json([
            'message' => 'Repeat deleted successfully'
        ]);
    }
}
