<?php

namespace App\Http\Controllers;

use App\Models\TimeTable;
use Carbon\Carbon;
use App\Http\Resources\TimeTableResource;
use App\Http\Requests\StoreTimeTableRequest;
use App\Http\Requests\UpdateTimeTableRequest;

class TimeTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $timetables = TimeTable::all();

        return TimeTableResource::collection($timetables);
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
     * @param  \App\Http\Requests\StoreTimeTableRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTimeTableRequest $request)
    {

        $timeTable = new TimeTable;
        $timeTable->class_type_id = $request->input('class_type_id');
        $timeTable->term_id = $request->input('term_id');
        $timeTable->subject_id = $request->input('subject_id');
        $timeTable->teacher_id = $request->input('teacher_id');
        $timeTable->session_id = $request->input('session_id');
        $timeTable->created_at = Carbon::now();;
        $timeTable->save();

        return new TimeTableResource($timeTable);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TimeTable  $timeTable
     * @return \Illuminate\Http\Response
     */
    public function show(TimeTable $timeTable)
    {
        return new TimeTableResource($timeTable);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TimeTable  $timeTable
     * @return \Illuminate\Http\Response
     */
    public function edit(TimeTable $timeTable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTimeTableRequest  $request
     * @param  \App\Models\TimeTable  $timeTable
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTimeTableRequest $request, TimeTable $timeTable)
    {
        $timeTable->class_type_id = $request->input('class_type_id');
        $timeTable->term_id = $request->input('term_id');
        $timeTable->subject_id = $request->input('subject_id');
        $timeTable->teacher_id = $request->input('teacher_id');
        $timeTable->session_id = $request->input('session_id');
        $timeTable->created_at = Carbon::now();
        $timeTable->update();

        return new TimeTableResource($timeTable);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TimeTable  $timeTable
     * @return \Illuminate\Http\Response
     */
    public function destroy(TimeTable $timeTable)
    {
        $timeTable = $timeTable->delete();

        return response()->json([
            'status' => true,
            'message' => 'Timetable deleted successfully'
        ]);      
    } 
    
}
