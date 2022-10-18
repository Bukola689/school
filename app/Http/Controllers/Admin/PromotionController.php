<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use App\Http\Resources\PromotionResource;
use App\Http\Requests\StorePromotionRequest;
use App\Http\Requests\UpdatePromotionRequest;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promotions = Promotion::orderBy('created_at', 'DESC')->get();

        return PromotionResource::collection($promotions);
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
     * @param  \App\Http\Requests\StorePromotionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePromotionRequest $request)
    {
        $promotion = new Promotion;
        $promotion->class_type_id = $request->input('class_type_id');
        $promotion->teacher_id = $request->input('teacher_id');
        $promotion->session_id = $request->input('session_id');
        $promotion->student_id = $request->input('student_id');
        $promotion->save();

        return new PromotionResource($promotion);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function show(Promotion $promotion)
    {
        return new PromotionResource($promotion);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function edit(Promotion $promotion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePromotionRequest  $request
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePromotionRequest $request, Promotion $promotion)
    {
        $promotion->class_type_id = $request->input('class_type_id');
        $promotion->teacher_id = $request->input('teacher_id');
        $promotion->session_id = $request->input('session_id');
        $promotion->student_id = $request->input('student_id');
        $promotion->update();

        return new PromotionResource($promotion);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promotion $promotion)
    {
        $promotion = $promotion->delete();

        return response()->json([
            'message' => 'Promotion deleted successfully'
        ]);
    }
}
