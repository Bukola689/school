<?php

namespace App\Http\Controllers;

use App\Models\LocalGovernment;
use App\Http\Resources\LocalGovernmentResource;
use App\Http\Requests\StoreLocalGovernmentRequest;
use App\Http\Requests\UpdateLocalGovernmentRequest;

class LocalGovernmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $localGovernments = LocalGovernment::orderBy('created_at', 'DESC')->get();

        return LocalGovernmentResource::collection($localGovernments);
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
     * @param  \App\Http\Requests\StoreLocalGovernmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLocalGovernmentRequest $request)
    {
        $localGovernment = new LocalGovernment;
        $localGovernment->name = $request->input('name');
        $localGovernment->save();

        return new LocalGovernmentResource($localGovernment);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LocalGovernment  $localGovernment
     * @return \Illuminate\Http\Response
     */
    public function show(LocalGovernment $localGovernment)
    {
        return new LocalGovernmentResource($localGovernment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LocalGovernment  $localGovernment
     * @return \Illuminate\Http\Response
     */
    public function edit(LocalGovernment $localGovernment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLocalGovernmentRequest  $request
     * @param  \App\Models\LocalGovernment  $localGovernment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLocalGovernmentRequest $request, LocalGovernment $localGovernment)
    {
        $localGovernment->name = $request->input('name');
        $localGovernment->update();

        return new LocalGovernmentResource($localGovernment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LocalGovernment  $localGovernment
     * @return \Illuminate\Http\Response
     */
    public function destroy(LocalGovernment $localGovernment)
    {
        $localGovernment = $localGovernment->delete();

        return response()->json([
            'message' => 'Local Government Deleted Successfully !'
        ]);
    }
}
