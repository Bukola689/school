<?php

use App\Http\Controllers\Admin\TimeTableController;

use Illuminate\Support\Facades\Route;

//Route::group(['middleware' => ['role:admin'], 'prefix' => 'admin'], function () {

    Route::get('timetables', [TimeTableController::class, 'index']);
    Route::post('timetables', [TimeTableController::class, 'store']);
    Route::get('timetables/{timeTable}', [TimeTableController::class, 'show']);
    Route::PUT('timetables/{timeTable}', [TimeTableController::class, 'update']);
    Route::delete('timetables/{timeTable}', [TimeTableController::class, 'destroy']);
 
 //}); 