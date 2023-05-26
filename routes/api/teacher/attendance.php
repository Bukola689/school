<?php

use App\Http\Controllers\Admin\AttendanceController;

use Illuminate\Support\Facades\Route;

//Route::group(['middleware' => ['role:admin'], 'prefix' => 'admin'], function () {

    Route::get('attendances', [AttendanceController::class, 'index']);
    Route::post('attendances', [AttendanceController::class, 'store']);
    Route::get('attendances/{attendance}', [AttendanceController::class, 'show']);
    Route::PUT('attendances/{attendance}', [AttendanceController::class, 'update']);
    Route::delete('attendances/{attendance}', [AttendanceController::class, 'destroy']);
    Route::get('attendances/{attendance}', [AttendanceController::class, 'status']);
 
 //}); 