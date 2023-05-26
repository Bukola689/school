<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\StaffRoom;
use App\Http\Resources\StaffRoomResource;
use App\Http\Requests\StoreStaffRoomRequest;
use App\Http\Requests\UpdateStaffRoomRequest;
use App\Repository\Admin\StaffRoom\StaffRoomRepository;

class StaffRoomController extends Controller
{

    public $staffRoom;

    public function __construct(StaffRoomRepository $staffRoom)
    {
        $this->staffRoom = $staffRoom;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffRooms = cache()->rememberForever('staffRoom:all', function () {
            return StaffRoom::orderBy('created_at', 'DESC')->get();
        });

        if($staffRooms->isEmpty()) {
            return response()->json('Staff Room Is Empty');
        }

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
        $data = $request->all();

        $this->staffRoom->savestaffRoom($request, $data);

        cache()->forget('staffRoom:all');

        return response()->json([
            'message' => 'staffRoom Saved Successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StaffRoom  $staffRoom
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $staffRoom = StaffRoom::find($id);

        if(! $staffRoom) {
            return response()->json('StaffRoom Not Found');
        }

        $staffRoomShow = cache()->rememberForever('staffRoom:'. $staffRoom->id, 60, function () use($staffRoom) {
            return $staffRoom;
        });

        return new StaffRoomResource($staffRoomShow);
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
    public function update(UpdateStaffRoomRequest $request,  $id)
    {
        $staffRoom = StaffRoom::find($id);

        if(! $staffRoom) {
            return response()->json('StaffRoom Not Found');
        }

        $data = $request->all();

        $this->staffRoom->updatestaffRoom($request, $staffRoom, $data);

        cache()->forget('staffRoom:'. $staffRoom->id);
        cache()->forget('staffRoom:all');

        return response()->json([
            'message' => 'staffRoom Updated Successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StaffRoom  $staffRoom
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $staffRoom = StaffRoom::find($id);

        if(! $staffRoom) {
            return response()->json('StaffRoom Not Found');
        }

        $this->staffRoom->removestaffRoom($staffRoom);

        cache()->forget('staffRoom:'. $staffRoom->id);
        cache()->forget('staffRoom:all');

        return response()->json([
            'message' => 'StaffRoom Deleted Successfully !'
        ]);
    }
}
