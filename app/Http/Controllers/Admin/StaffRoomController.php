<?php

namespace App\Http\Controllers;

use App\Models\StaffRoom;
use App\Http\Resources\StaffRoomResource;
use App\Http\Requests\StoreStaffRoomRequest;
use App\Http\Requests\UpdateStaffRoomRequest;

class StaffRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffRooms = StaffRoom::orderBy('created_at', 'DESC')->get();

        return StaffRoomResource::collection($staffRooms);
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
     * @param  \App\Http\Requests\StoreStaffRoomRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStaffRoomRequest $request)
    {
        $staffRoom = new StaffRoom;
        $staffRoom->teacher_id = $request->input('teacher_id');
        $staffRoom->room_no = $request->input('room_no');
        $staffRoom->save();

        return new StaffRoomResource($staffRoom);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StaffRoom  $staffRoom
     * @return \Illuminate\Http\Response
     */
    public function show(StaffRoom $staffRoom)
    {
        return new StaffRoomResource($staffRoom);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StaffRoom  $staffRoom
     * @return \Illuminate\Http\Response
     */
    public function edit(StaffRoom $staffRoom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStaffRoomRequest  $request
     * @param  \App\Models\StaffRoom  $staffRoom
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStaffRoomRequest $request, StaffRoom $staffRoom)
    {
        $staffRoom->teacher_id = $request->input('teacher_id');
        $staffRoom->room_no = $request->input('room_no');
        $staffRoom->update();

        return new StaffRoomResource($staffRoom);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StaffRoom  $staffRoom
     * @return \Illuminate\Http\Response
     */
    public function destroy(StaffRoom $staffRoom)
    {
        $staffRoom = $staffRoom->delete();

        return response()->json([
            'message' => 'StaffRoom Deleted Successfully !'
        ]);
    }
}
