<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreParentRequest;
use App\Http\Requests\UpdateParentRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Models\MyParent;
use App\Repository\Admin\ParentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ParentController extends Controller
{
    public $parent;

    public function __construct(ParentRepository $parent)
    {
        $this->parent = $parent;
    }


    public function index()
    {
        $parents = Cache::remember('parents', 60,  function () {
            return  MyParent::orderBy('id', 'desc')->paginate(5);
        });
        
        if($parents->isEmpty()) {
            return response()->json('Parent Is Empty');
        }

        return response()->json($parents);
    }

    public function store(StoreParentRequest $request)
    {
        $data = $request->all();

        $this->parent->saveParent($request, $data);

        cache()->forget('parent:all');

       return response()->json([
           'message' => 'Parent Saved Successfully'
       ]);
    }

    public function show($id)
    {
        $parent = MyParent::find($id);

        if(! $parent) {
            return response()->json('Parent Not Found');
        }

        $parentShow = Cache::remember('parent:'. $parent->id, function () use($parent) {
            return $parent;
        });

        return response()->json($parentShow);
    }

    public function update(UpdateParentRequest $request, $id)
    {

        $parent = MyParent::find($id);

        if(! $parent) {
            return response()->json('Parent Not Found');
        }

         $data = $request->all();

         $this->parent->updateParent($request, $parent, $data);

         cache()->forget('parent:'. $parent->id);
         cache()->forget('parent:all');

        return response()->json([
            'message' => 'Parent Updated Successfully'
        ]);
    }

      /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $parent = MyParent::find($id);

        if(! $parent) {
            return response()->json('Parent Not Found');
        }

        $this->parent->removeParent($parent);

        cache()->forget('parent:'. $parent->id);
        cache()->forget('parent:all');

        return response()->json([
            'message' => 'Parent Removed Successfully'
        ]);
    }
}
