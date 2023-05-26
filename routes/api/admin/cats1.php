<?php

use App\Http\Controllers\Admin\Cat1Controller;

use Illuminate\Support\Facades\Route;

//Route::group(['middleware' => ['role:admin'], 'prefix' => 'admin'], function () {

   
   
    Route::get('cat1s/{cat1}', [Cat1Controller::class, 'show']);

 
 //}); 