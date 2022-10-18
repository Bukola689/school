<?php

namespace App\Http\Controllers;

use App\Models\Graduate;
use App\Http\Resources\GraduateResource;
use App\Http\Requests\StoreGraduateRequest;
use App\Http\Requests\UpdateGraduateRequest;

class GraduateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $graduates = Graduate::orderBy('created_at', 'DESC')->get();

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

        //dd($request->all());
        $graduate = new Graduate;
        $graduate->class_type_id = $request->input('class_type_id');
        $graduate->term_id = $request->input('term_id');
        $graduate->session_id = $request->input('session_id');
        $graduate->student_id = $request->input('student_id');
        $graduate->save();

        return new GraduateResource($graduate);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Graduate  $graduate
     * @return \Illuminate\Http\Response
     */
    public function show(Graduate $graduate)
    {
        return new GraduateResource($graduate);
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
    public function update(UpdateGraduateRequest $request, Graduate $graduate)
    {
        $graduate->class_type_id = $request->input('class_type_id');
        $graduate->term_id = $request->input('term_id');
        $graduate->session_id = $request->input('session_id');
        $graduate->student_id = $request->input('student_id');
        $graduate->update();

        return new GraduateResource($graduate);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Graduate  $graduate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Graduate $graduate)
    {
        $graduate = $graduate->delete();

        return response()->json([
            'message' => 'Graduate deleted successfully'
        ]);
    }
}
