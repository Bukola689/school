<?php

namespace App\Http\Controllers;

use App\Models\Examination;
use App\Http\Resources\ExaminationResource;
use App\Http\Requests\StoreExaminationRequest;
use App\Http\Requests\UpdateExaminationRequest;

class ExaminationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $examinations = Examination::orderBy('created_at', 'DESC')->get();

        return ExaminationResource::collection($examinations);
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
     * @param  \App\Http\Requests\StoreExaminationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExaminationRequest $request)
    {
        $examination = new Examination;
        $examination->class_type_id = $request->input('class_type_id');
        $examination->teacher_id = $request->input('teacher_id');
        $examination->subject_id = $request->input('subject_id');
        $examination->student_id = $request->input('student_id');
        $examination->mark = $request->input('mark');
        $examination->save();

        return new ExaminationResource($examination);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Examination  $examination
     * @return \Illuminate\Http\Response
     */
    public function show(Examination $examination)
    {
        return new ExaminationResource($examination);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Examination  $examination
     * @return \Illuminate\Http\Response
     */
    public function edit(Examination $examination)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExaminationRequest  $request
     * @param  \App\Models\Examination  $examination
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExaminationRequest $request, Examination $examination)
    {
        $examination->class_type_id = $request->input('class_type_id');
        $examination->teacher_id = $request->input('teacher_id');
        $examination->subject_id = $request->input('subject_id');
        $examination->student_id = $request->input('student_id');
        $examination->mark = $request->input('mark');
        $examination->update();

        return new ExaminationResource($examination);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Examination  $examination
     * @return \Illuminate\Http\Response
     */
    public function destroy(Examination $examination)
    {
        $examination = $examination->delete();

        return response()->json([
            'message' => 'Examination deleted successfully'
        ]);
    }
}
