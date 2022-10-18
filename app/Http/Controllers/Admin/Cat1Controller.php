<?php

namespace App\Http\Controllers;

use App\Models\Cat1;
use App\Http\Resources\Cat1Resource;
use App\Http\Requests\StoreCat1Request;
use App\Http\Requests\UpdateCat1Request;

class Cat1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat1s = Cat1::all();

        return Cat1Resource::collection($cat1s);
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
     * @param  \App\Http\Requests\StoreCat1Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCat1Request $request)
    {
        $cat1 = new Cat1;
        $cat1->class_type_id = $request->input('class_type_id');
        $cat1->student_id = $request->input('student_id');
        $cat1->subject_id = $request->input('subject_id');
        $cat1->teacher_id = $request->input('teacher_id');
        $cat1->score = $request->input('score');
        $cat1->save();

        return new Cat1Resource($cat1);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cat1  $cat1
     * @return \Illuminate\Http\Response
     */
    public function show(Cat1 $cat1)
    {
        return new Cat1Resource($cat1);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cat1  $cat1
     * @return \Illuminate\Http\Response
     */
    public function edit(Cat1 $cat1)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCat1Request  $request
     * @param  \App\Models\Cat1  $cat1
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCat1Request $request, Cat1 $cat1)
    {
        $cat1->class_type_id = $request->input('class_type_id');
        $cat1->student_id = $request->input('student_id');
        $cat1->subject_id = $request->input('subject_id');
        $cat1->teacher_id = $request->input('teacher_id');
        $cat1->score = $request->input('score');
        $cat1->update();

        return new Cat1Resource($cat1);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cat1  $cat1
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cat1 $cat1)
    {
        $cat1 = $cat1->delete();

        return response()->json([
            'message' => 'Contineous Accessment Test One deleted'
        ]);      
    }
}
