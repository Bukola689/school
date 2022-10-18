<?php

namespace App\Http\Controllers;

use App\Models\Hostel;
use App\Http\Resources\HostelResource;
use App\Http\Requests\StoreHostelRequest;
use App\Http\Requests\UpdateHostelRequest;

class HostelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hostels = Hostel::orderBy('created_at', 'DESC')->get();

        return HostelResource::collection($hostels);
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
     * @param  \App\Http\Requests\StoreHostelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHostelRequest $request)
    {
        $hostel = new Hostel;
        $hostel->student_id = $request->input('student_id');
        $hostel->block = $request->input('block');
        $hostel->room_no = $request->input('room_no');
        $hostel->save();

        return new HostelResource($hostel);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hostel  $hostel
     * @return \Illuminate\Http\Response
     */
    public function show(Hostel $hostel)
    {
        return new HostelResource($hostel);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hostel  $hostel
     * @return \Illuminate\Http\Response
     */
    public function edit(Hostel $hostel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHostelRequest  $request
     * @param  \App\Models\Hostel  $hostel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHostelRequest $request, Hostel $hostel)
    {
        $hostel->student_id = $request->input('student_id');
        $hostel->block = $request->input('block');
        $hostel->room_no = $request->input('room_no');
        $hostel->update();

        return new HostelResource($hostel);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hostel  $hostel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hostel $hostel)
    {
        $hostel = $hostel->delete();

        return response()->json([
            'message' => 'Hostel Deleted Successfully !'
        ]);
    }
}
