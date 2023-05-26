<?php

use App\Http\Controllers\Admin\ExaminationController;

use Illuminate\Support\Facades\Route;

//Route::group(['middleware' => ['role:admin'], 'prefix' => 'admin'], function () {

    Route::get('examinations', [ExaminationController::class, 'index']);
    Route::post('examinations', [ExaminationController::class, 'store']);
    Route::get('examinations/{examination}', [ExaminationController::class, 'show']);
    Route::PUT('examinations/{examination}', [ExaminationController::class, 'update']);
    Route::delete('examinations/{examination}', [ExaminationController::class, 'destroy']);
 
 //}); 