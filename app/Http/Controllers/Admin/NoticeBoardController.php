<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\NoticeBoard;
use App\Http\Resources\NoticeBoardResource;
use App\Http\Requests\StoreNoticeBoardRequest;
use App\Http\Requests\UpdateNoticeBoardRequest;
use App\Repository\Admin\NoticeBoard\NoticeBoardRepository;

class NoticeBoardController extends Controller
{
    public $noticeBoard;

    public function __construct(NoticeBoardRepository $noticeBoard)
    {
        $this->noticeBoard = $noticeBoard;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticeBoards =  cache()->rememberForever('noticeBoard:all', function () {
            return   NoticeBoard::orderBy('created_at', 'DESC')->get();
        });

        if($noticeBoards->isEmpty()) {
            return response()->json('Notice Board Is Empty');
        }

        return NoticeBoardResource::collection($noticeBoards);
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
     * @param  \App\Http\Requests\StoreNoticeBoardRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNoticeBoardRequest $request)
    {
        $data = $request->all();

        $this->noticeBoard->savenoticeBoard($request, $data);

        cache()->forget('noticeBoard:all');

        return response()->json([
            'message' => 'noticeBoard Saved Successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NoticeBoard  $noticeBoard
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $noticeBoard = NoticeBoard::find($id);

        if(! $noticeBoard) {
            return response()->json('Notice Board Not Found');
        }

        $noticeBoardShow = cache()->rememberForever('noticeBoard:'. $noticeBoard->id, function () use($noticeBoard) {
            return $noticeBoard;
        });

        return new NoticeBoardResource($noticeBoardShow);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NoticeBoard  $noticeBoard
     * @return \Illuminate\Http\Response
     */
    public function edit(NoticeBoard $noticeBoard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNoticeBoardRequest  $request
     * @param  \App\Models\NoticeBoard  $noticeBoard
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNoticeBoardRequest $request, $id)
    {
        $noticeBoard = NoticeBoard::find($id);

        if(! $noticeBoard) {
            return response()->json('Notice Board Not Found');
        }

        $data = $request->all();

        $this->noticeBoard->updatenoticeBoard($request, $noticeBoard, $data);

        cache()->forget('noticeBoard:'. $noticeBoard->id);
        cache()->forget('noticeBoard:all');

        return response()->json([
            'message' => 'noticeBoard Updated Successfully'
        ]);  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NoticeBoard  $noticeBoard
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $noticeBoard = NoticeBoard::find($id);

        if(! $noticeBoard) {
            return response()->json('Notice Board Not Found');
        }

       $this->noticeBoard->removeNoticeBoard($noticeBoard);

       cache()->forget('noticeBoard:'. $noticeBoard->id);
       cache()->forget('noticeBoard:all');

        return response()->json([
            'message' => 'Notice Board deleted Successfully'
        ]);
    }
}
