<?php

use App\Http\Controllers\Admin\NoticeBoardController;

use Illuminate\Support\Facades\Route;

//Route::group(['middleware' => ['role:admin'], 'prefix' => 'admin'], function () {

    Route::get('noticeboards', [NoticeBoardController::class, 'index']);
    Route::post('noticeboards', [NoticeBoardController::class, 'store']);
    Route::get('noticeboards/{noticeBoard}', [NoticeBoardController::class, 'show']);
    Route::PUT('noticeboards/{noticeBoard}', [NoticeBoardController::class, 'update']);
    Route::delete('noticeboards/{noticeBoard}', [NoticeBoardController::class, 'destroy']);

 //}); 