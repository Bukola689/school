<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\MyClass;
use App\Http\Resources\MyClassResource;
use App\Http\Requests\StoreMyClassRequest;
use App\Http\Requests\UpdateMyClassRequest;
use App\Repository\Admin\MyClass\MyClassRepository;

Class MyClassController extends Controller
{
    public $myClass;

    public function __construct(MyClassRepository $myClass)
    {
        $this->myClass = $myClass;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $myClasses =  cache()->rememberForever('myClass:all', function () {
            return  MyClass::orderBy('created_at', 'DESC')->get();
        });

        if($myClasses->isEmpty()) {
            return response()->json('Class Is Empty');
        }

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
       $data = $request->all();

       $this->myClass->saveClass($request, $data);

       cache()->forget('myClass:all');

        return response()->json([
            'message' => 'Class Created Successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MyClass  $myClass
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $myClass = MyClass::find($id);

        if(! $myClass) {
            return response()->json('MyClass Not Found');
        }

        $myClassShow = cache()->rememberForever('myClass:'. $myClass->id, function () use($myClass) {
            return $myClass;
        });

        return new MyClassResource($myClassShow);
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
    public function update(UpdateMyClassRequest $request,  $id)
    {
        $myClass = MyClass::find($id);

        if(! $myClass) {
            return response()->json('MyClass Not Found');
        }

        $data = $request->all();

        $this->myClass->updateClass($request, $myClass, $data);

        cache()->forget('myClass:'. $myClass->id);
        cache()->forget('myClass:all');

        return response()->json([
            'message' => 'Class Updated Successfully'
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MyClass  $myClass
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $myClass = MyClass::find($id);

        if(! $myClass) {
            return response()->json('MyClass Not Found');
        }

       $this->myClass->removeClass($myClass);

       cache()->forget('myClass:'. $myClass->id);
       cache()->forget('myClass:all');

        return response()->json([
            'message' => 'MyClass Deleted Successfully !'
        ]);
    }
}
