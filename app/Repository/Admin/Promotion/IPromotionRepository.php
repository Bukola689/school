<?php

namespace App\Repository\Admin\Promotion;

use App\Models\Promotion;
use Illuminate\Http\Request;

interface IPromotionRepository
{
    public function savePromotion(Request $request, array $data);

     public function updatePromotion(Request $request, Promotion $promotion, array $data);

     public function removePromotion(Promotion $promotion);
}