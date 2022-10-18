<?php

namespace App\Http\Controllers;

use App\Models\Cat2;
use App\Http\Resources\Cat2Resource;
use App\Http\Requests\StoreCat2Request;
use App\Http\Requests\UpdateCat2Request;

class Cat2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat2s = Cat2::all();

        return Cat2Resource::Collection($cat2s);
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
     * @param  \App\Http\Requests\StoreCat2Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCat2Request $request)
    {
        $cat2 = new Cat2;
        $cat2->class_type_id = $request->input('class_type_id');
        $cat2->student_id = $request->input('student_id');
        $cat2->subject_id = $request->input('subject_id');
        $cat2->teacher_id = $request->input('teacher_id');
        $cat2->score = $request->input('score');
        $cat2->save();

        return new Cat2Resource($cat2);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cat2  $cat2
     * @return \Illuminate\Http\Response
     */
    public function show(Cat2 $cat2)
    {
        return new Cat2Resource($cat2);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cat2  $cat2
     * @return \Illuminate\Http\Response
     */
    public function edit(Cat2 $cat2)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCat2Request  $request
     * @param  \App\Models\Cat2  $cat2
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCat2Request $request, Cat2 $cat2)
    {
        $cat2->class_type_id = $request->input('class_type_id');
        $cat2->student_id = $request->input('student_id');
        $cat2->subject_id = $request->input('subject_id');
        $cat2->teacher_id = $request->input('teacher_id');
        $cat2->score = $request->input('score');
        $cat2->update();

        return new Cat2Resource($cat2);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cat2  $cat2
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cat2 $cat2)
    {
        $cat2 = $cat2->delete();

        return response()->json([
            'message' => 'CAT deleted Successfully'
        ]); 
    }
}
