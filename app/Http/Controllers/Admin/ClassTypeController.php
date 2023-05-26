<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClassType;
use App\Http\Resources\ClassTypeResource;
use App\Http\Requests\StoreClassTypeRequest;
use App\Http\Requests\UpdateClassTypeRequest;
use App\Repository\Admin\ClassTypeRepository;

class ClassTypeController extends Controller
{
    public $classType;

    public function __construct(ClassTypeRepository $classType)
    {
        $this->classType = $classType;
    }
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classtypes =  cache()->rememberForever('classtype:all', function () {
            ClassType::orderBy('created_at', 'DESC')->get();
        });

        if($classtypes->isEmpty()) {
            return response()->json('Class Type Is Empty');
        }

        return ClassTypeResource::Collection($classtypes);
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
       $data = $request->all();

       $this->classType->saveClassType($request, $data);

       cache()->forget('classtype:all');

        return response()->json([
            'message' => 'ClassType Saved Successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClassType  $classType
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $classType = ClassType::find($id);

        if(! $classType) {
            return response()->json('Cat 3 Not Found');
        }

        $classTypeShow = cache()->rememberForever('classType:'. $classType->id, function () use($classType) {
            return $classType;
        });

        return new ClassTypeResource($classTypeShow);
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
    public function update(UpdateClassTypeRequest $request, $id)
    {
        $classType = ClassType::find($id);

        if(! $classType) {
            return response()->json('Cat 3 Not Found');
        }
      
        $data = $request->all();

        $this->classType->updateClassType($request, $classType, $data);

        cache()->forget('classType:'. $classType->id);
        cache()->forget('classType:all');
 
         return response()->json([
             'message' => 'ClassType Updated Successfully'
         ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClassType  $classType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $classType = ClassType::find($id);

        if(! $classType) {
            return response()->json('Cat 3 Not Found');
        }

       $this->classType->removeClassType($classType);

       cache()->forget('classType:'. $classType->id);
       cache()->forget('classType:all');

        return response()->json([
            'message' => 'ClassType Deleted Successfully !'
        ]);
    }
}
