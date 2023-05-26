<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Term;
use App\Http\Resources\TermResource;
use App\Http\Requests\StoreTermRequest;
use App\Http\Requests\UpdateTermRequest;
use App\Repository\Admin\TermRepository;

class TermController extends Controller
{
    public $term;

    public function __construct(TermRepository $term)
    {
        $this->term = $term;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $terms = cache()->rememberForever('term:all', function () {
            return Term::orderBy('created_at', 'DESC')->get();
        });

        if($terms->isEmpty()) {
            return response()->json('terms Is Empty');
        }

        return TermResource::Collection($terms);
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
     * @param  \App\Http\Requests\StoreTermRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTermRequest $request)
    {
        
       $data = $request->all();

       $this->term->saveTerm($request, $data);

       cache()->forget('term:all');

        return response()->json([
            'message' => 'Term Saved Successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Term  $term
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $term = Term::find($id);

        if(! $term) {
            return response()->json('term Not Found');
        }

        $termShow = cache()->rememberForever('term:'. $term->id, function () use($term) {
            return $term;
        });

        return new TermResource($termShow);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Term  $term
     * @return \Illuminate\Http\Response
     */
    public function edit(Term $term)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTermRequest  $request
     * @param  \App\Models\Term  $term
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTermRequest $request, $id)
    {
        $term = Term::find($id);

        if(! $term) {
            return response()->json('term Not Found');
        }

        $data = $request->all();

        $this->term->updateTerm($request, $term, $data);

        cache()->forget('term:'. $term->id);
        cache()->forget('term:all');
 
         return response()->json([
             'message' => 'Term Update Successfully'
         ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Term  $term
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $term = Term::find($id);

        if(! $term) {
            return response()->json('term Not Found');
        }

        $this->term->removeTerm($term);

        cache()->forget('term:'. $term->id);
        cache()->forget('term:all');

        return response()->json([
            'message' => 'Term deleted successfully !'
        ]);
    }
}
