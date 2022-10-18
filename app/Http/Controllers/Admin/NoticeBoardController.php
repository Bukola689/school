<?php

namespace App\Http\Controllers;

use App\Models\NoticeBoard;
use App\Http\Resources\NoticeBoardResource;
use App\Http\Requests\StoreNoticeBoardRequest;
use App\Http\Requests\UpdateNoticeBoardRequest;

class NoticeBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticeBoard = NoticeBoard::orderBy('created_at', 'DESC')->get();

        return NoticeBoardResource::collection($noticeBoard);
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
        $noticeBoard = new NoticeBoard;
        $noticeBoard->title = $request->input('title');
        $noticeBoard->description = $request->input('description');
        $noticeBoard->save();

        return new NoticeBoardResource($noticeBoard);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NoticeBoard  $noticeBoard
     * @return \Illuminate\Http\Response
     */
    public function show(NoticeBoard $noticeBoard)
    {
        return new NoticeBoardResource($noticeBoard);
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
    public function update(UpdateNoticeBoardRequest $request, NoticeBoard $noticeBoard)
    {
        $noticeBoard->title = $request->input('title');
        $noticeBoard->description = $request->input('description');
        $noticeBoard->update();

        return new NoticeBoardResource($noticeBoard);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NoticeBoard  $noticeBoard
     * @return \Illuminate\Http\Response
     */
    public function destroy(NoticeBoard $noticeBoard)
    {
        $noticeBoard = $noticeBoard->delete();

        return response()->json([
            'message' => 'Notice Board deleted Successfully'
        ]);
    }
}
