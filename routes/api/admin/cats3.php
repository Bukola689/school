<?php

use App\Http\Controllers\Admin\Cat3Controller;

use Illuminate\Support\Facades\Route;

//Route::group(['middleware' => ['role:admin'], 'prefix' => 'admin'], function () {

   
    Route::get('cat3s/{cat3}', [Cat3Controller::class, 'show']);

 
 //}); 