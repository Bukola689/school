<?php

namespace App\Http\Controllers;

use App\Models\MarkSheet;
use Carbon\Carbon;
use App\Http\Resources\MarkSheetResource;
use App\Http\Requests\StoreMarkSheetRequest;
use App\Http\Requests\UpdateMarkSheetRequest;

class MarkSheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marksheets = MarkSheet::orderBy('created_at', 'DESC')->get();

        return MarkSheetResource::collection($marksheets);
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
     * @param  \App\Http\Requests\StoreMarkSheetRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMarkSheetRequest $request)
    {
        $markSheet = new MarkSheet;
        $markSheet->term_id = $request->input('term_id');
        $markSheet->class_type_id = $request->input('class_type_id');
        $markSheet->student_id = $request->input('student_id');
        $markSheet->subject_id = $request->input('subject_id');
        $markSheet->session_id = $request->input('session_id');
        $markSheet->teacher_id = $request->input('teacher_id');
        $markSheet->mark_date = Carbon::now();
        $markSheet->cat1_id = $request->input('cat1_id');
        $markSheet->cat2_id = $request->input('cat2_id');
        $markSheet->cat3_id = $request->input('cat3_id');
        $markSheet->examination_id = $request->input('examination_id');
        $markSheet->save();

        return new MarkSheetResource($markSheet);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MarkSheet  $markSheet
     * @return \Illuminate\Http\Response
     */
    public function show(MarkSheet $markSheet)
    {
        return new MarkSheetResource($markSheet);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MarkSheet  $markSheet
     * @return \Illuminate\Http\Response
     */
    public function edit(MarkSheet $markSheet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMarkSheetRequest  $request
     * @param  \App\Models\MarkSheet  $markSheet
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMarkSheetRequest $request, MarkSheet $markSheet)
    {
        $markSheet->term_id = $request->input('term_id');
        $markSheet->class_type_id = $request->input('class_type_id');
        $markSheet->student_id = $request->input('student_id');
        $markSheet->subject_id = $request->input('subject_id');
        $markSheet->session_id = $request->input('session_id');
        $markSheet->teacher_id = $request->input('teacher_id');
        $markSheet->mark_date = Carbon::now();
        $markSheet->cat1_id = $request->input('cat1_id');
        $markSheet->cat2_id = $request->input('cat2_id');
        $markSheet->cat3_id = $request->input('cat3_id');
        $markSheet->examination_id = $request->input('examination_id');
        $markSheet->update();

        return new MarkSheetResource($markSheet);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MarkSheet  $markSheet
     * @return \Illuminate\Http\Response
     */
    public function destroy(MarkSheet $markSheet)
    {
        $markSheet = $markSheet->delete();

        return response()->json([
            'message' => 'MarkSheet deleted successfully'
        ]);
    }
}
