<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hostel;
use App\Http\Resources\HostelResource;
use App\Http\Requests\StoreHostelRequest;
use App\Http\Requests\UpdateHostelRequest;
use App\Repository\Admin\Hostel\HostelRepository;

class HostelController extends Controller
{

    public $hostel;

    public function __construct(HostelRepository $hostel)
    {
        $this->hostel = $hostel;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hostels =  cache()->rememberForever('hostel:all', function () {
            return  Hostel::orderBy('created_at', 'DESC')->get();
        });

        if($hostels->isEmpty()) {
            return response()->json('Hostel Is Empty');
        }

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
        $data = $request->all();

        $this->hostel->saveHostel($request, $data);

        cache()->forget('hostel:all');

        return response()->json([
            'message' => 'Hostel Saved Successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hostel  $hostel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hostel = Hostel::find($id);

        if(! $hostel) {
            return response()->json('Hostel Not Found');
        }

        $hostelShow = cache()->rememberForever('hostel:'. $hostel->id, function () use($hostel) {
            return $hostel;
        });

        return new HostelResource($hostelShow);
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
    public function update(UpdateHostelRequest $request, $id)
    {
        $hostel = Hostel::find($id);

        if(! $hostel) {
            return response()->json('Hostel Not Found');
        }

       
        $data = $request->all();

        $this->hostel->updateHostel($request, $hostel, $data);

        cache()->forget('hostel:'. $hostel->id);
        cache()->forget('hostel:all');

        return response()->json([
            'message' => 'Hostel Updated Successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hostel  $hostel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hostel = Hostel::find($id);

        if(! $hostel) {
            return response()->json('Hostel Not Found');
        }
       
        $this->hostel->removeHostel($hostel);

        cache()->forget('hostel:'. $hostel->id);
        cache()->forget('hostel:all');

        return response()->json([
            'message' => 'Hostel Deleted Successfully !'
        ]);
    }
}
