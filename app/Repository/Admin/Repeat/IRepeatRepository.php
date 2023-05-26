<?php

namespace App\Repository\Admin\Repeat;

use App\Models\Repeat;
use Illuminate\Http\Request;

interface IRepeatRepository
{
    public function saveRepeat(Request $request, array $data);

     public function updateRepeat(Request $request, Repeat $repeat, array $data);

     public function removeRepeat(Repeat $repeat);
}