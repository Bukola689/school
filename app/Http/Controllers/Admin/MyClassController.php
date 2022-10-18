<?php

namespace App\Http\Controllers;

use App\Models\MyClass;
use App\Http\Resources\MyClassResource;
use App\Http\Requests\StoreMyClassRequest;
use App\Http\Requests\UpdateMyClassRequest;

class MyClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $myClasses = MyClass::orderBy('created_at', 'DESC')->get();

        return MyClassResource::collection($myClasses);
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
     * @param  \App\Http\Requests\StoreMyClassRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMyClassRequest $request)
    {
        $myClass = new MyClass;
        $myClass->name = $request->input('name');
        $myClass->save();

        return new MyClassResource($myClass);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MyClass  $myClass
     * @return \Illuminate\Http\Response
     */
    public function show(MyClass $myClass)
    {
        return new MyClassResource($myClass);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MyClass  $myClass
     * @return \Illuminate\Http\Response
     */
    public function edit(MyClass $myClass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMyClassRequest  $request
     * @param  \App\Models\MyClass  $myClass
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMyClassRequest $request, MyClass $myClass)
    {
        $myClass->name = $request->input('name');
        $myClass->update();

        return new MyClassResource($myClass);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MyClass  $myClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(MyClass $myClass)
    {
        $myClass = $myClass->delete();

        return response()->json([
            'message' => 'MyClass Deleted Successfully !'
        ]);
    }
}
