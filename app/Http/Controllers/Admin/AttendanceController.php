<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Carbon\Carbon;
use App\Http\Resources\AttendanceResource;
use App\Http\Requests\StoreAttendanceRequest;
use App\Http\Requests\UpdateAttendanceRequest;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attendances = Attendance::orderBy('created_at', 'DESC')->get();

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
        $attendance = new Attendance;
        $attendance->student_id = $request->input('student_id');
        $attendance->class_type_id = $request->input('class_type_id');
        $attendance->teacher_id = $request->input('teacher_id');
        $attendance->status = 'absent';
        $attendance->att_date = Carbon::now();
        $attendance->save();

        return new AttendanceResource($attendance);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance)
    {
        return new AttendanceResource($attendance);
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
    public function update(UpdateAttendanceRequest $request, Attendance $attendance)
    {
        $attendance->student_id = $request->input('student_id');
        $attendance->class_type_id= $request->input('class_type_id');
        $attendance->teacher_id = $request->input('teacher_id');
        $attendance->att_date = 'absent';
        $attendance->att_date = Carbon::now();
        $attendance->update();

        return new AttendanceResource($attendance);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        $attendance = $attendance->delete();

        return response()->json([
            'message' => 'Attendance Deleted Successfully !'
        ]);
    }
}
