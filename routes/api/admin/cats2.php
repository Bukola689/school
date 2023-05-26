<?php

use App\Http\Controllers\Admin\Cat2Controller;

use Illuminate\Support\Facades\Route;

//Route::group(['middleware' => ['role:admin'], 'prefix' => 'admin'], function () {

    
    Route::get('cat2s/{cat2}', [Cat2Controller::class, 'show']);
   
 
 //}); 