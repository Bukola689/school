<?php

namespace App\Repository\Admin\NoticeBoard;

use App\Models\NoticeBoard;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NoticeBoardRepository implements INoticeBoardRepository
{
   public function saveNoticeBoard(Request $request, array $data)
    {

      $noticeBoard = new NoticeBoard;
      $noticeBoard->title = $request->input('title');
      $noticeBoard->description = $request->input('description');
      $noticeBoard->save();

    }

    public function updateNoticeBoard(Request $request, NoticeBoard $noticeBoard, array $data)
     {

      $noticeBoard->title = $request->input('title');
      $noticeBoard->description = $request->input('description');
      $noticeBoard->update();
      
     }

     public function removeNoticeBoard(NoticeBoard $noticeBoard)
     {
        $noticeBoard = $noticeBoard->delete();
     }
}