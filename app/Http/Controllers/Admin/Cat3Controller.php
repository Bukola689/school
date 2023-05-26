<?php

namespace App\Http\Controllers;

use App\Models\Cat3;
use App\Http\Resources\Cat3Resource;
use App\Http\Requests\StoreCat3Request;
use App\Http\Requests\UpdateCat3Request;
use App\Repository\Admin\Cat3\Cat3Repository;

class Cat3Controller extends Controller
{
    public $cat3;

    public function __construct(Cat3Repository  $cat3)
    {
        $this->cat3 = $cat3;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat3s = cache()->rememberForever('cat3:all', function () {
            return  Cat3::orderBy('id', 'desc')->paginate(5);;
        });

        if($cat3s->isEmpty()) {
            return response()->json('Cat 3 Is Empty');
        }

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
        $data = $request->all();

        $this->cat3->saveCat3($request, $data);
 
         return response()->json([
             'message' => 'Cat One Saved Successfully'
         ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cat3  $cat3
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cat3 = Cat3::find($id);

        if(! $cat3) {
            return response()->json('Cat 3 Not Found');
        }

        $cat3Show = cache()->rememberForever('cat3:'. $cat3->id, function () use($cat3) {
            return  $cat3;
        });

        return new Cat3Resource($cat3Show);
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
    public function update(UpdateCat3Request $request, $id)
    {
        $cat3 = Cat3::find($id);

        if(! $cat3) {
            return response()->json('Cat 3 Not Found');
        }

        $data = $request->all();

        $this->cat3->updateCat3($request, $cat3, $data);

        cache()->forget('cat3:'. $cat3->id);
        cache()->forget('cat3:all');
 
         return response()->json([
             'message' => 'Cat Two Updated Successfully'
         ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cat3  $cat3
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat3 = Cat3::find($id);

        if(! $cat3) {
            return response()->json('Cat 3 Not Found');
        }

        $cat3->delete();

        cache()->forget('cat3:'. $cat3->id);
        cache()->forget('cat3:all');

        return response()->json([
            'message' => 'CAT deleted Successfully'
        ]);
    }
}
