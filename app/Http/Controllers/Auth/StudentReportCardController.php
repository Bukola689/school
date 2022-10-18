<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use App\Models\ReportCard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StudentReportCardController extends Controller
{
    public function viewReportCard()
    {
        
        if(Auth::id())
        {    
            $reportCard = ReportCard::with('student')->where('user_id', Auth::id())->get();


            return response()->json([
                'status' => true,
                'report card' => $reportCard
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'No Record Found'
            ]);
        }
    }
}
