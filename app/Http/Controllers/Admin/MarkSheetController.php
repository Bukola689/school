<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\MarkSheet;
use Carbon\Carbon;
use App\Http\Resources\MarkSheetResource;
use App\Http\Requests\StoreMarkSheetRequest;
use App\Http\Requests\UpdateMarkSheetRequest;
use App\Repository\Admin\Marksheet\MarksheetRepository;

class MarkSheetController extends Controller
{
    public $markSheet;

    public function __construct(MarksheetRepository $markSheet)
    {
        $this->markSheet = $markSheet;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marksheets = cache()->rememberForever('markSheet:all', function () {
            return  MarkSheet::orderBy('created_at', 'DESC')->get();
        });
        
        if($marksheets->isEmpty()) {
            return response()->json('Mark SHeet Is Empty');
        }


        return MarkSheetResource::collection($marksheets);
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
     * @param  \App\Http\Requests\StoreMarkSheetRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMarkSheetRequest $request)
    {
        $data = $request->all();

       $this->markSheet->saveMarkSheet($request, $data);

       cache()->forget('markSheet:all');

        return response()->json([
            'message' => 'Mark Sheet Saved Successfully'
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MarkSheet  $markSheet
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $markSheet = MarkSheet::find($id);

        if(! $markSheet) {
            return response()->json('MarkSheet Not Found');
        }

        $markSheetId = cache()->rememberForever('markSheet:'. $markSheet->id, function () use($markSheet) {
            return $markSheet;
        });

        return new MarkSheetResource($markSheetId);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MarkSheet  $markSheet
     * @return \Illuminate\Http\Response
     */
    public function edit(MarkSheet $markSheet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMarkSheetRequest  $request
     * @param  \App\Models\MarkSheet  $markSheet
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMarkSheetRequest $request, $id)
    {
        $markSheet = MarkSheet::find($id);

        if(! $markSheet) {
            return response()->json('MarkSheet Not Found');
        }

        $data = $request->all();

        $this->markSheet->updateMarkSheet($request, $markSheet, $data);

        cache()->forget('markSheet:'. $markSheet->id);
        cache()->forget('markSheet:all');

        return response()->json([
            'message' => 'Marksheet Updated Successfully'
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MarkSheet  $markSheet
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $markSheet = MarkSheet::find($id);

        if(! $markSheet) {
            return response()->json('MarkSheet Not Found');
        }

        $this->markSheet->removeMarkSheet($markSheet);

        cache()->forget('markSheet:'. $markSheet->id);
        cache()->forget('markSheet:all');

        return response()->json([
            'message' => 'MarkSheet deleted successfully'
        ]);
    }
}
