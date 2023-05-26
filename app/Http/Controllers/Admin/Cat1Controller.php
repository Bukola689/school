<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Cat1;
use App\Http\Resources\Cat1Resource;
use App\Http\Requests\StoreCat1Request;
use App\Http\Requests\UpdateCat1Request;
use App\Repository\Admin\Cat1\Cat1Repository;

class Cat1Controller extends Controller
{
    public $cat1;

    public function __construct( Cat1Repository $cat1)
    {
        $this->cat1 = $cat1;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat1s = cache()->rememberForever('cat1s:all', function () {
            Cat1::orderBy('id', 'desc')->paginate(5);
        });

        if($cat1s->isEmpty()) {
            return response()->json('Cat 1 Is Empty');
        }

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
       $data = $request->all();

       $this->cat1->saveCat1($request, $data);

       cache()->forget('cat1:all');

        return response()->json([
            'message' => 'Cat One Saved Successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cat1  $cat1
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cat1 = Cat1::find($id);

        if(! $cat1) {
            return response()->json('Cat 1 Not Found');
        }

        $cat1Show = cache()->rememberForever('cat1:'. $cat1->id, function () use ($cat1) {
            return $cat1;
        });

        return new Cat1Resource($cat1Show);
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
    public function update(UpdateCat1Request $request, $id)
    {
        $cat1 = Cat1::find($id);

        if(! $cat1) {
            return response()->json('Cat 1 Not Found');
        }

        $data = $request->all();

        $this->cat1->updateCat1($request, $cat1, $data);

        cache()->forget('cat1:'. $cat1->id);
        cache()->forget('cat1:all');
 
         return response()->json([
             'message' => 'Contineous Accessment Test One Updated Successfully'
         ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cat1  $cat1
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat1 = Cat1::find($id);

        if(! $cat1) {
            return response()->json('Cat 1 Not Found');
        }

        $this->cat1->removeCat1($cat1);

        cache()->forget('cat1:'. $cat1->id);
        cache()->forget('cat1:all');

        return response()->json([
            'message' => 'Contineous Accessment Test One deleted'
        ]);      
    }
}
