<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\LocalGovernment;
use App\Http\Resources\LocalGovernmentResource;
use App\Http\Requests\StoreLocalGovernmentRequest;
use App\Http\Requests\UpdateLocalGovernmentRequest;
use App\Repository\Admin\LgaRepository;

class LocalGovernmentController extends Controller
{
    public $lga;

    public function __construct(LgaRepository $lga)
    {
        $this->lga = $lga;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $localGovernments =  cache()->rememberForever('localGovernment:all', function () {
            return  LocalGovernment::orderBy('created_at', 'DESC')->get();
        });
        
        if($localGovernments->isEmpty()) {
            return response()->json('Local Government Area Is Empty');
        }

        
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
       $data = $request->all();

       $this->lga->saveLocalGovernment($request, $data);

       cache()->forget('localGovernment:all');

        return response()->json([
            'message' => 'L G A Saved Suucessfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LocalGovernment  $localGovernment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $localGovernment = LocalGovernment::find($id);

        if(! $localGovernment) {
            return response()->json('Hostel Not Found');
        }

        $lgaShow = cache()->rememberForever('localGovernment:'. $localGovernment->id, function () use($localGovernment) {
            return $localGovernment;
        });

        return new LocalGovernmentResource($lgaShow);
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
    public function update(UpdateLocalGovernmentRequest $request, $id)
    {
        $localGovernment = LocalGovernment::find($id);

        if(! $localGovernment) {
            return response()->json('Hostel Not Found');
        }
      
        $data = $request->all();

        $this->lga->updateLocalGovernment($request, $localGovernment, $data);

        cache()->forget('localGovernment:'. $localGovernment->id);
        cache()->forget('localGovernment:all');
 
         return response()->json([
             'message' => 'L G A Update Suucessfully'
         ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LocalGovernment  $localGovernment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $localGovernment = LocalGovernment::find($id);

        if(! $localGovernment) {
            return response()->json('Hostel Not Found');
        }

        $this->lga->removeLocalGovernment($localGovernment);

        cache()->forget('localGovernment:'. $localGovernment->id);
        cache()->forget('localGovernment:all');

        return response()->json([
            'message' => 'Local Government Deleted Successfully !'
        ]);
    }
}
