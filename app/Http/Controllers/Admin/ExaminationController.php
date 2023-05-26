<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Examination;
use App\Http\Resources\ExaminationResource;
use App\Http\Requests\StoreExaminationRequest;
use App\Http\Requests\UpdateExaminationRequest;
use App\Repository\Admin\Examination\ExaminationRepository;
use Illuminate\Filesystem\Cache;

class ExaminationController extends Controller
{
    public $examination;

    public function __construct( ExaminationRepository $examination)
    {
        $this->examination = $examination;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $examinations = cache()->rememberForever('examination:all', function () {
            return Examination::orderBy('created_at', 'DESC')->get();
        });

        if($examinations->isEmpty()) {
            return response()->json('Examination Is Empty');
        }

        return ExaminationResource::collection($examinations);
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
     * @param  \App\Http\Requests\StoreExaminationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExaminationRequest $request)
    {
        $data = $request->all();

        $this->examination->saveExamination($request, $data);

        cache()->forget('examination:all');
 
         return response()->json([
             'message' => 'Examination Saved Successfully'
         ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Examination  $examination
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $examination = Examination::find($id);

        if(! $examination) {
            return response()->json('Examination Not Found');
        }

        $examinationShow = cache()->rememberForever('examination:'. $examination->id, function () use($examination) {
            return $examination;
        });

        return new ExaminationResource($examinationShow);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Examination  $examination
     * @return \Illuminate\Http\Response
     */
    public function edit(Examination $examination)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExaminationRequest  $request
     * @param  \App\Models\Examination  $examination
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExaminationRequest $request, $id)
    {
        $examination = Examination::find($id);

        if(! $examination) {
            return response()->json('Examination Not Found');
        }

        $data = $request->all();

        $this->examination->updateExamination($request, $examination, $data);

        cache()->forget('examination:'. $examination->id);
        cache()->forget('examination:all');
 
         return response()->json([
             'message' => 'Examination Updated Successfully'
         ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Examination  $examination
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $examination = Examination::find($id);

        if(! $examination) {
            return response()->json('Examination Not Found');
        }

        $this->examination->removeExamination($examination);

        cache()->forget('examination:'. $examination->id);
        cache()->forget('examination:all');

        return response()->json([
            'message' => 'Examination deleted successfully'
        ]);
    }
}
