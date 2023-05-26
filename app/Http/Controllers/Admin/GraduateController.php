<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Graduate;
use App\Http\Resources\GraduateResource;
use App\Http\Requests\StoreGraduateRequest;
use App\Http\Requests\UpdateGraduateRequest;
use App\Repository\Admin\Graduate\GraduateRepository;

class GraduateController extends Controller
{
    public $graduate;

    public function __construct(GraduateRepository $graduate)
    {
        $this->graduate = $graduate;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $graduates = cache()->rememberForever('graduate:all', function () {
            return  Graduate::orderBy('created_at', 'DESC')->get();
        });

        if($graduates->isEmpty()) {
            return response()->json('Graduate Is Empty');
        }
        
        return GraduateResource::collection($graduates);
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
     * @param  \App\Http\Requests\StoreGraduateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGraduateRequest $request)
    {

        $data = $request->all();

        $this->graduate->saveGraduate($request, $data);

        cache()->forget('graduate:all');

        return response()->json([
            'message' => 'graduate Saved Successfully'
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Graduate  $graduate
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $graduate = Graduate::find($id);

        if(! $graduate) {
            return response()->json('Graduat Not Found');
        }

        $graduateShow = cache()->rememberForever('graduate:'. $graduate->id, function () use($graduate) {
            return $graduate;
        });

        return new GraduateResource($graduateShow);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Graduate  $graduate
     * @return \Illuminate\Http\Response
     */
    public function edit(Graduate $graduate)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGraduateRequest  $request
     * @param  \App\Models\Graduate  $graduate
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGraduateRequest $request, $id)
    {
        $graduate = Graduate::find($id);

        if(! $graduate) {
            return response()->json('Graduat Not Found');
        }

        $data = $request->all();

        $this->graduate->updateGraduate($request, $graduate, $data);

        cache()->forget('graduate:'. $graduate->id);
        cache()->forget('graduate:all');

        return response()->json([
            'message' => 'Graduate Updated Successfully'
        ]);   return new GraduateResource($graduate);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Graduate  $graduate
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $graduate = Graduate::find($id);

        if(! $graduate) {
            return response()->json('Graduat Not Found');
        }

        $this->graduate->removeGraduate($graduate);

        cache()->forget('graduate:'. $graduate->id);
        cache()->forget('graduate:all');

        return response()->json([
            'message' => 'Graduate deleted successfully'
        ]);
    }
}
