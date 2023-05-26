<?php

namespace App\Repository\Admin\NoticeBoard;

use App\Models\NoticeBoard;
use Illuminate\Http\Request;

interface INoticeBoardRepository
{
    public function saveNoticeBoard(Request $request, array $data);

     public function updateNoticeBoard(Request $request, NoticeBoard $noticeBoard, array $data);

     public function removeNoticeBoard(NoticeBoard $noticeBoard);
}