<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Cat2;
use App\Http\Resources\Cat2Resource;
use App\Http\Requests\StoreCat2Request;
use App\Http\Requests\UpdateCat2Request;
use App\Repository\Admin\Cat2\Cat2Repository;

class Cat2Controller extends Controller
{

    public $cat2;

    public function __construct(Cat2Repository  $cat2)
    {
        $this->cat2 = $cat2;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat2s = cache()->rememberForever('attendance:all', function () {
            return  Cat2::orderBy('id', 'desc')->paginate(5);;
        });

        if($cat2s->isEmpty()) {
            return response()->json('Cat 2 Is Empty');
        }

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
        $data = $request->all();

       $this->cat2->saveCat2($request, $data);

       cache()->forget('cat2:all');

        return response()->json([
            'message' => 'Cat Two Saved Successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cat2  $cat2
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cat2 = Cat2::find($id);

        if(! $cat2) {
            return response()->json('Cat 2 Not Found');
        }


        $cat2Show = cache()->rememberForever('cat2:'. $cat2->id, function () use ($cat2) {
            return $cat2;
        });
        
        return new Cat2Resource($cat2Show);
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
    public function update(UpdateCat2Request $request,  $id)
    {
        $cat2 = Cat2::find($id);

        if(! $cat2) {
            return response()->json('Cat 2 Not Found');
        }

        $data = $request->all();

        $this->cat2->updateCat2($request, $cat2, $data);

        cache()->forget('cat2:'. $cat2->id);
        cache()->forget('cat2:all');
 
         return response()->json([
             'message' => 'Cat Two Updated Successfully'
         ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cat2  $cat2
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $cat2 = Cat2::find($id);

        if(! $cat2) {
            return response()->json('Cat 2 Not Found');
        }

        $cat2->delete();

        cache()->forget('cat2:'. $cat2->id);
        cache()->forget('cat2:all');

        return response()->json([
            'message' => 'CAT deleted Successfully'
        ]); 
    }
}
