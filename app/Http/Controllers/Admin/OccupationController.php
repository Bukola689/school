<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Occupation;
use App\Http\Resources\OccupationResource;
use App\Http\Requests\StoreOccupationRequest;
use App\Http\Requests\UpdateOccupationRequest;
use App\Repository\Admin\OccupationRepository;

class OccupationController extends Controller
{
    public $occupation;

    public function __construct(OccupationRepository $occupation)
    {
         $this->occupation = $occupation;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $occupations = cache()->rememberForever('occupations', 60,function () {
            return Occupation::orderBy('created_at', 'DESC')->paginate(5);
        });
        
        if($occupations->isEmpty()) {
            return response()->json('Occuaption Is Empty');
        }

        return OccupationResource::collection($occupations);
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
     * @param  \App\Http\Requests\StoreOccupationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOccupationRequest $request)
    {
       $data = $request->all();

       $this->occupation->saveOccupation($request, $data);

       cache()->forget('occupation:all');

        return response()->json([
            'message' => 'Occupation Saved Successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Occupation  $occupation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $occupation = Occupation::find($id);

        if(! $occupation) {
            return response()->json('Occupation Not Found');
        }

        $occupationShow = cache()->rememberForever('occupation:'. $occupation->id, function () use($occupation) {
            return $occupation;
        });

        return new OccupationResource($occupationShow);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Occupation  $occupation
     * @return \Illuminate\Http\Response
     */
    public function edit(Occupation $occupation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOccupationRequest  $request
     * @param  \App\Models\Occupation  $occupation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOccupationRequest $request,  $id)
    {
        $occupation = Occupation::find($id);

        if(! $occupation) {
            return response()->json('Occupation Not Found');
        }

        $data = $request->all();

        $this->occupation->updateOccupation($request, $occupation, $data);

        cache()->forget('occupation:'. $occupation->id);
        cache()->forget('occupation:all');
 
         return response()->json([
             'message' => 'Occupation Updated Successfully'
         ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Occupation  $occupation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $occupation = Occupation::find($id);

        if(! $occupation) {
            return response()->json('Occupation Not Found');
        }

        $this->occupation->removeOccupation($occupation);

        cache()->forget('occupation:'. $occupation->id);
        cache()->forget('occupation:all');

        return response()->json([
            'message' => 'occupation deleted successfully',
        ]);
    }
}
