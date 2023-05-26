<?php

use App\Http\Controllers\Admin\OccupationController;

use Illuminate\Support\Facades\Route;

//Route::group(['middleware' => ['role:admin'], 'prefix' => 'admin'], function () {

    Route::get('/occupations', [OccupationController::class, 'index']);
    Route::post('/occupations', [OccupationController::class, 'store']);
    Route::get('/occupations/{occupation}', [OccupationController::class, 'show']);
    Route::put('/occupations/{occupation}', [OccupationController::class, 'update']);
    Route::DELETE('/occupations/{occupation}', [OccupationController::class, 'destroy']);
    Route::get('/occupations/{search}', [OccupationController::class, 'searchBrand']);   
 
 //}); 