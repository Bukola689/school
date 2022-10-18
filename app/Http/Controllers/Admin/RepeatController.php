<?php

namespace App\Http\Controllers;

use App\Models\Repeat;
use App\Http\Resources\RepeatResource;
use App\Http\Requests\StoreRepeatRequest;
use App\Http\Requests\UpdateRepeatRequest;

class RepeatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $repeats = Repeat::orderBy('created_at', 'DESC')->get();

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
        $repeat = new Repeat;
        $repeat->class_type_id = $request->input('class_type_id');
        $repeat->teacher_id = $request->input('teacher_id');
        $repeat->session_id = $request->input('session_id');
        $repeat->student_id = $request->input('student_id');
        $repeat->save();

        return new RepeatResource($repeat);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Repeat  $repeat
     * @return \Illuminate\Http\Response
     */
    public function show(Repeat $repeat)
    {
        return new RepeatResource($repeat);
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
    public function update(UpdateRepeatRequest $request, Repeat $repeat)
    {
        $repeat->class_type_id = $request->input('class_type_id');
        $repeat->teacher_id = $request->input('teacher_id');
        $repeat->session_id = $request->input('session_id');
        $repeat->student_id = $request->input('student_id');
        $repeat->update();

        return new RepeatResource($repeat);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Repeat  $repeat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Repeat $repeat)
    {
        $repeat = $repeat->delete();

        return response()->json([
            'message' => 'Repeat deleted successfully'
        ]);
    }
}
