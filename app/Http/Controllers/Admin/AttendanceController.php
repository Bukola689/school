<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Carbon\Carbon;
use App\Http\Resources\AttendanceResource;
use App\Http\Requests\StoreAttendanceRequest;
use App\Http\Requests\UpdateAttendanceRequest;
use App\Repository\Admin\Attendance\AttendanceRepository;
use Illuminate\Filesystem\Cache;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public $attendance;

    public function __construct( AttendanceRepository $attendance)
    {
        $this->attendance = $attendance;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attendances = cache()->rememberForever('attendance:all', function () {
           return  Attendance::orderBy('created_at', 'DESC')->get();
        });

        if($attendances->isEmpty()) {
            return response()->json('Attendance Is Empty');
        }

        return AttendanceResource::collection($attendances);
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
     * @param  \App\Http\Requests\StoreAttendanceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAttendanceRequest $request)
    {
        $data = $request->all();

       $this->attendance->saveAttendance($request, $data);

       cache()->forget('attendance:all');

        return response()->json([
            'message' => 'Attendance Saved Successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $attendance = Attendance::find($id);

        if(! $attendance) {
            return response()->json('Attendance Not Found');
        }

        $attendanceShow = cache()->rememberForever('attendance:'. $attendance->id, function () use ($attendance) {
            return $attendance;
        });
        
        return new AttendanceResource($attendanceShow);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request,Attendance $attendance)
    {
        $attendance->status = $request->attendance['status'] ? 'Present' : 'Absent';
        $attendance->update();

        return response()->json([
            'status' => true,
            'attendance' => $attendance
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAttendanceRequest  $request
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAttendanceRequest $request, $id)
    {
        $attendance = Attendance::find($id);

        if(! $attendance) {
            return response()->json('Attendance Not Found');
        }

        $data = $request->all();

        $this->attendance->updateAttendance($request, $attendance, $data);

        cache()->forget('attendance:'. $attendance->id);
        cache()->forget('attendance:all');
 
         return response()->json([
             'message' => 'Attendance Updated Successfully'
         ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attendance = Attendance::find($id);

        if(! $attendance) {
            return response()->json('Attendance Not Found');
        }
       
        $this->attendance->removeAttendance($attendance);

        cache()->forget('attendance:'. $attendance->id);
        cache()->forget('attendance:all');

        return response()->json([
            'message' => 'Attendance Deleted Successfully !'
        ]);
    }
}
