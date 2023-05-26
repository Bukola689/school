<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TimeTable;
use Carbon\Carbon;
use App\Http\Resources\TimeTableResource;
use App\Http\Requests\StoreTimeTableRequest;
use App\Http\Requests\UpdateTimeTableRequest;
use App\Repository\Admin\TimeTable\TimeTableRepository;

class TimeTableController extends Controller
{

    public $timetable;

    public function __construct( TimeTableRepository $timetable)
    {
        $this->timetable = $timetable;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $timetables =  cache()->rememberForever('timeTable:all', function () {
            return TimeTable::orderBy('created_at', 'DESC')->get();
        });

        if($timetables->isEmpty()) {
            return response()->json('timetables Is Empty');
        }

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

      $data = $request->all();

      $this->timetable->saveTimetable($request, $data);

      cache()->forget('timeTable:all');

        return response()->json([
            'message' => 'Time Table Saved Succesfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TimeTable  $timeTable
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $timeTable = TimeTable::find($id);

        if(! $timeTable) {
            return response()->json('timeTable Not Found');
        }

        $timeTableShow = cache()->rememberForever('timeTable:'. $timeTable->id, function () use($timeTable) {
            return $timeTable;
        });

        return new TimeTableResource($timeTableShow);
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
    public function update(UpdateTimeTableRequest $request, $id)
    {
        $timeTable = TimeTable::find($id);

        if(! $timeTable) {
            return response()->json('timeTable Not Found');
        }

        $data = $request->all();

        $this->timetable->updateTimetable($request, $timeTable,$data);

        cache()->forget('timeTable:'. $timeTable->id);
        cache()->forget('timeTable:all');
  
          return response()->json([
              'message' => 'Time Table Updated Succesfully'
          ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TimeTable  $timeTable
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $timeTable = TimeTable::find($id);

        if(! $timeTable) {
            return response()->json('timeTable Not Found');
        }

        $this->timetable->removeTimetable($timeTable);

        cache()->forget('timeTable:'. $timeTable->id);
        cache()->forget('timeTable:all');

        return response()->json([
            'status' => true,
            'message' => 'Timetable deleted successfully'
        ]);      
    } 
    
}
