<?php

namespace App\Http\Controllers;

use App\Models\ClassType;
use App\Http\Resources\ClassTypeResource;
use App\Http\Requests\StoreClassTypeRequest;
use App\Http\Requests\UpdateClassTypeRequest;

class ClassTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classtype = ClassType::orderBy('created_at', 'DESC')->get();

        return ClassTypeResource::Collection($classtype);
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
     * @param  \App\Http\Requests\StoreClassTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClassTypeRequest $request)
    {
        $classType = new ClassType;
        $classType->my_class_id = $request->input('my_class_id');
        $classType->name = $request->input('name');
        $classType->save();

        return new ClassTypeResource($classType);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClassType  $classType
     * @return \Illuminate\Http\Response
     */
    public function show(ClassType $classType)
    {
        return new ClassTypeResource($classType);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClassType  $classType
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassType $classType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClassTypeRequest  $request
     * @param  \App\Models\ClassType  $classType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClassTypeRequest $request, ClassType $classType)
    {
        $classType->my_class_id = $request->input('my_class_id');
        $classType->name = $request->input('name');
        $classType->update();

        return new ClassTypeResource($classType);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClassType  $classType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassType $classType)
    {
        $classType = $classType->delete();

        return response()->json([
            'message' => 'ClassType Deleted Successfully !'
        ]);
    }
}
