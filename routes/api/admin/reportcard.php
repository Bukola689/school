<?php

use App\Http\Controllers\Admin\ReportCardController;

use Illuminate\Support\Facades\Route;

//Route::group(['middleware' => ['role:admin'], 'prefix' => 'admin'], function () {

 

  Route::get('reportcards/{reportCard}', [ReportCardController::class, 'show']);
 
 //}); 