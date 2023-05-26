<?php

use App\Http\Controllers\Admin\MarkSheetController;

use Illuminate\Support\Facades\Route;

//Route::group(['middleware' => ['role:admin'], 'prefix' => 'admin'], function () {

    Route::get('marksheets', [MarkSheetController::class, 'index']);
    Route::post('marksheets', [MarkSheetController::class, 'store']);
    Route::get('marksheets/{markSheet}', [MarkSheetController::class, 'show']);
    Route::PUT('marksheets/{markSheet}', [MarkSheetController::class, 'update']);
    Route::delete('marksheets/{markSheet}', [MarkSheetController::class, 'destroy']);
 
 //}); 