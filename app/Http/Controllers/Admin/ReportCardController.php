<?php

namespace App\Http\Controllers;

use App\Models\ReportCard;
use App\Http\Resources\ReportCardResource;
use App\Http\Requests\StoreReportCardRequest;
use App\Http\Requests\UpdateReportCardRequest;

class ReportCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reportCards = ReportCard::orderBy('id', 'desc')->get();

        
        return ReportCardResource::collection($reportCards);
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
     * @param  \App\Http\Requests\StoreReportCardRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReportCardRequest $request)
    {
        $reportCard = new ReportCard;
        $reportCard->class_type_id = $request->input('class_type_id');
        $reportCard->term_id = $request->input('term_id');
        $reportCard->subject_id = $request->input('subject_id');
        $reportCard->teacher_id = $request->input('teacher_id');
        $reportCard->session_id = $request->input('session_id');
        $reportCard->student_id = $request->input('student_id');
        $reportCard->cat1_id = $request->input('cat1_id');
        $reportCard->cat2_id = $request->input('cat2_id');
        $reportCard->cat3_id = $request->input('cat3_id');
        $reportCard->examination_id = $request->input('examination_id');
        $reportCard->position = $request->input('position');
        $reportCard->percentage = $request->input('percentage');
        $reportCard->comments = $request->input('comments');
        $reportCard->save();

        return new ReportCardResource($reportCard);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReportCard  $reportCard
     * @return \Illuminate\Http\Response
     */
    public function show(ReportCard $reportCard)
    {
        return new ReportCardResource($reportCard);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReportCard  $reportCard
     * @return \Illuminate\Http\Response
     */
    public function edit(ReportCard $reportCard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReportCardRequest  $request
     * @param  \App\Models\ReportCard  $reportCard
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReportCardRequest $request, ReportCard $reportCard)
    {
        $reportCard->class_type_id = $request->input('class_type_id');
        $reportCard->term_id = $request->input('term_id');
        $reportCard->subject_id = $request->input('subject_id');
        $reportCard->teacher_id = $request->input('teacher_id');
        $reportCard->session_id = $request->input('session_id');
        $reportCard->student_id = $request->input('student_id');
        $reportCard->cat1_id = $request->input('cat1_id');
        $reportCard->cat2_id = $request->input('cat2_id');
        $reportCard->cat3_id = $request->input('cat3_id');
        $reportCard->examination_id = $request->input('examination_id');
        $reportCard->position = $request->input('position');
        $reportCard->percentage = $request->input('percentage');
        $reportCard->comments = $request->input('comments');
        $reportCard->update();

        return new ReportCardResource($reportCard);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReportCard  $reportCard
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReportCard $reportCard)
    {
        $reportCard = $reportCard->delete();

        return response()->json([
            'message' => 'ReportCard deleted successfully'
        ]);
    }
}
