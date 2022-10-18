<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use App\Models\NoticeBoard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class NoticeBoardController extends Controller
{
    public function noticeBoard()
    {
       $id = Auth::id();

       $noticeBoard = NoticeBoard::where('id', $id)->get();

       return response()->json([
        'status' => true,
        'noticeBoard' => $noticeBoard
       ]);
    }
}
