<?php

use App\Http\Controllers\Admin\ClassTypeController;

use Illuminate\Support\Facades\Route;

//Route::group(['middleware' => ['role:admin'], 'prefix' => 'admin'], function () {



    Route::get('classTypes/{classType}', [ClassTypeController::class, 'show']);
 
 //}); 