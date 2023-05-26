<?php

use App\Http\Controllers\Admin\MyClassController;

use Illuminate\Support\Facades\Route;

//Route::group(['middleware' => ['role:admin'], 'prefix' => 'admin'], function () {

  

   Route::get('classes/{class}', [MyClassController::class, 'show']);
 
 //}); 