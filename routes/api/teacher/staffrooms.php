<?php

use App\Http\Controllers\Admin\StaffRoomController;

use Illuminate\Support\Facades\Route;

//Route::group(['middleware' => ['role:admin'], 'prefix' => 'admin'], function () {

    Route::get('staffRooms', [StaffRoomController::class, 'index']);
    Route::post('staffRooms', [StaffRoomController::class, 'store']);
    Route::get('staffRooms/{staffRoom}', [StaffRoomController::class, 'show']);
    Route::PUT('staffRooms/{staffRoom}', [StaffRoomController::class, 'update']);
    Route::delete('staffRooms/{staffRoom}', [StaffRoomController::class, 'destroy']);
 
 //}); 