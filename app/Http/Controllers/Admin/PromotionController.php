<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Promotion;
use App\Http\Resources\PromotionResource;
use App\Http\Requests\StorePromotionRequest;
use App\Http\Requests\UpdatePromotionRequest;
use App\Repository\Admin\Promotion\PromotionRepository;

class PromotionController extends Controller
{
    public $promotion;

    public function __construct(PromotionRepository $promotion)
    {
        $this->promotion = $promotion;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promotions =  cache()->rememberForever('promotion:all', 60, function () {
            return Promotion::orderBy('created_at', 'DESC')->get();
        });

        if($promotions->isEmpty()) {
            return response()->json('Promotion Is Empty');
        }
        
        return PromotionResource::collection($promotions);
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
     * @param  \App\Http\Requests\StorePromotionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePromotionRequest $request)
    {
        $data = $request->all();

        $this->promotion->savePromotion($request, $data);

        cache()->forget('promotion:all');

        return response()->json([
            'message' => 'Promotion Saved Successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $promotion = Promotion::find($id);

        if(! $promotion) {
            return response()->json('Promotion Not Found');
        }

        $promotionShow = cache()->rememberForever('promotion:'. $promotion->id, function () use($promotion) {
            return $promotion;
        });

        return new PromotionResource($promotionShow);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function edit(Promotion $promotion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePromotionRequest  $request
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePromotionRequest $request, $id)
    {
        $promotion = Promotion::find($id);

        if(! $promotion) {
            return response()->json('Promotion Not Found');
        }

        $data = $request->all();

        $this->promotion->updatePromotion($request, $promotion, $data);

        cache()->forget('promotion:'. $promotion->id);
        cache()->forget('promotion:all');

        return response()->json([
            'message' => 'Promotion Updated Successfully'
        ]);  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $promotion = Promotion::find($id);

        if(! $promotion) {
            return response()->json('Promotion Not Found');
        }

        $this->promotion->removePromotion($promotion);

        cache()->forget('promotion:'. $promotion->id);
        cache()->forget('promotion:all');

        return response()->json([
            'message' => 'Promotion deleted successfully'
        ]);
    }
}
