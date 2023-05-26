<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ReportCard;
use App\Http\Resources\ReportCardResource;
use App\Http\Requests\StoreReportCardRequest;
use App\Http\Requests\UpdateReportCardRequest;
use App\Repository\Admin\ReportCard\ReportCardRepository;

class ReportCardController extends Controller
{
    public $reportCard;

    public function __construct(ReportCardRepository $reportCard)
    {
        $this->reportCard = $reportCard;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reportCards = cache()->rememberForever('reportCard:all', function () {
            return ReportCard::orderBy('id', 'desc')->get();
        });

        if($reportCards->isEmpty()) {
            return response()->json('Report Card Is Empty');
        }
        
        return ReportCardResource::collection($reportCards);
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
     * @param  \App\Http\Requests\StoreReportCardRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReportCardRequest $request)
    {
        $data = $request->all();

       $this->reportCard->saveReportCard($request, $data);

       cache()->forget('reportCard:all');

        return response()->json([
            'message' => 'Report Card Saved Successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReportCard  $reportCard
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reportCard = ReportCard::find($id);

        if(! $reportCard) {
            return response()->json('ReportCard Not Found');
        }

        $reportCardShow = cache()->rememberForever('reportCard:'. $reportCard->id, 60, function () use($reportCard) {
            return $reportCard;
        });


        return new ReportCardResource($reportCardShow);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReportCard  $reportCard
     * @return \Illuminate\Http\Response
     */
    public function edit(ReportCard $reportCard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReportCardRequest  $request
     * @param  \App\Models\ReportCard  $reportCard
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReportCardRequest $request, $id)
    {
        $reportCard = ReportCard::find($id);

        if(! $reportCard) {
            return response()->json('ReportCard Not Found');
        }

        $data = $request->all();

        $this->reportCard->updateReportCard($request, $reportCard, $data);

        cache()->forget('reportCard:'. $reportCard->id);
        cache()->forget('reportCard:all');
 
         return response()->json([
             'message' => 'Report Card Updated Successfully'
         ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReportCard  $reportCard
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reportCard = ReportCard::find($id);

        if(! $reportCard) {
            return response()->json('ReportCard Not Found');
        }

        $this->reportCard->removeReportCard($reportCard);

        cache()->forget('reportCard:'. $reportCard->id);
        cache()->forget('reportCard:all');

        return response()->json([
            'message' => 'ReportCard deleted successfully'
        ]);
    }
}
