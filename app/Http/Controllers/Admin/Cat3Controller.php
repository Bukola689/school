<?php

namespace App\Http\Controllers;

use App\Models\Cat3;
use App\Http\Resources\Cat3Resource;
use App\Http\Requests\StoreCat3Request;
use App\Http\Requests\UpdateCat3Request;

class Cat3Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat3s = Cat3::all();

        return Cat3Resource::Collection($cat3s);
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
     * @param  \App\Http\Requests\StoreCat3Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCat3Request $request)
    {
        $cat3 = new Cat3;
        $cat3->class_type_id = $request->input('class_type_id');
        $cat3->student_id = $request->input('student_id');
        $cat3->subject_id = $request->input('subject_id');
        $cat3->teacher_id = $request->input('teacher_id');
        $cat3->score = $request->input('score');
        $cat3->save();

        return new Cat3Resource($cat3);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cat3  $cat3
     * @return \Illuminate\Http\Response
     */
    public function show(Cat3 $cat3)
    {
        return new Cat3Resource($cat3);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cat3  $cat3
     * @return \Illuminate\Http\Response
     */
    public function edit(Cat3 $cat3)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCat3Request  $request
     * @param  \App\Models\Cat3  $cat3
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCat3Request $request, Cat3 $cat3)
    {
        $cat3->class_type_id = $request->input('class_type_id');
        $cat3->student_id = $request->input('student_id');
        $cat3->subject_id = $request->input('subject_id');
        $cat3->teacher_id = $request->input('teacher_id');
        $cat3->score = $request->input('score');
        $cat3->update();

        return new Cat3Resource($cat3);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cat3  $cat3
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cat3 $cat3)
    {
        $cat3 = $cat3->delete();

        return response()->json([
            'message' => 'CAT deleted Successfully'
        ]);
    }
}
