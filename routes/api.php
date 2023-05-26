<?php

use App\Helpers\Route\RouteHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\auth\ChangePasswordController;
use App\Http\Controllers\Auth\StudentHostelController;
use App\Http\Controllers\Auth\StudentClassTypeController;
use App\Http\Controllers\Auth\StudentReportCardController;
use App\Http\Controllers\Auth\StudentTimeTableController;
use App\Http\Controllers\Auth\StudentProfileController;
use App\Http\Controllers\Auth\ParentProfileController;
use App\Http\Controllers\Auth\ClassController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

  Route::group(['v1'], function() {


        //....auth....//
        Route::group(['prefix'=> 'auth'], function() {
          Route::post('register', [RegisterController::class, 'register']);
          Route::post('login', [LoginController::class, 'login']);
          Route::post('forgot-password', [ForgotPasswordController::class, 'forgotPassword']);
       Route::group(['middleware' => 'auth:sanctum'], function() {
          Route::post('logout', [LogoutController::class, 'logout']);
          Route::post('/email/verification-notification', [VerifyEmailController::class, 'resendNotification'])->name('verification.send');
          Route::post('reset-password', [ResetPasswordController::class, 'resetPassword']); 

       });
   });

            Route::group(['middleware' => 'me', 'middleware' => 'auth:sanctum'], function() {
 
            Route::post('/profiles', [ProfileController::class, 'updateProfile']);
            Route::post('/change-password', [ProfileController::class, 'changePassword']);
            Route::get('/student-profiles', [StudentProfileController::class, 'studentProfile']);
            Route::get('/parent-profiles', [ParentProfileController::class, 'parentProfile']);
            Route::get('/teacher-profiles', [TeacherProfileController::class, 'teacherProfile']);

           });

           Route::group(['middleware' => ['role:admin'], 'prefix' => 'admin'], function () {

             Route::get('/users', [UserController::class, 'index']);
             Route::post('/users', [UserController::class, 'store']);
             Route::get('/users/{user}', [UserController::class, 'show']);
             Route::put('/users/{user}', [UserController::class, 'update']);
             Route::DELETE('/users/{user}', [UserController::class, 'destroy']);
             Route::get('/users/{search}', [UserController::class, 'searchUser']);
             Route::get('countries', [CountryController::class, 'index']);
             Route::post('countries', [CountryController::class, 'store']);
             Route::get('countries/{country}', [CountryController::class, 'show']);
             Route::PUT('countries/{country}', [CountryController::class, 'update']);
             Route::delete('countries/{country}', [CountryController::class, 'destroy']);
             Route::get('lgas', [LocalGovernmentController::class, 'index']);
             Route::post('lgas', [LocalGovernmentController::class, 'store']);
             Route::get('lgas/{localGovernment}', [LocalGovernmentController::class, 'show']);
             Route::PUT('lgas/{localGovernment}', [LocalGovernmentController::class, 'update']);
             Route::delete('lgas/{localGovernment}', [LocalGovernmentController::class, 'destroy']);
             Route::get('parents', [ParentController::class, 'index']);
             Route::post('parents', [ParentController::class, 'store']);
             Route::get('parents/{parent}', [ParentController::class, 'show']);
             Route::PUT('parents/{parent}', [ParentController::class, 'update']);
             Route::delete('parents/{parent}', [ParentController::class, 'destroy']);
             Route::get('students', [StudentController::class, 'index']);
             Route::post('students', [StudentController::class, 'store']);
             Route::get('students/{student}', [StudentController::class, 'show']);
             Route::PUT('students/{student}', [StudentController::class, 'update']);
             Route::delete('students/{student}', [StudentController::class, 'destroy']);
             Route::get('teachers', [TeacherController::class, 'index']);
             Route::post('teachers', [TeacherController::class, 'store']);
             Route::get('teachers/{teacher}', [TeacherController::class, 'show']);
             Route::PUT('teachers/{teacher}', [TeacherController::class, 'update']);
             Route::delete('teachers/{teacher}', [TeacherController::class, 'destroy']);
             Route::get('sessions', [SessionController::class, 'index']);
             Route::post('sessions', [SessionController::class, 'store']);
             Route::get('sessions/{session}', [SessionController::class, 'show']);
             Route::PUT('sessions/{session}', [SessionController::class, 'update']);
             Route::delete('sessions/{session}', [SessionController::class, 'destroy']);
             Route::get('states', [StateController::class, 'index']);
             Route::post('states', [StateController::class, 'store']);
             Route::get('states/{state}', [StateController::class, 'show']);
             Route::PUT('states/{state}', [StateController::class, 'update']);
             Route::delete('states/{state}', [StateController::class, 'destroy']);
             Route::get('terms', [TermController::class, 'index']);
             Route::post('terms', [TermController::class, 'store']);
             Route::get('terms/{term}', [TermController::class, 'show']);
             Route::PUT('terms/{term}', [TermController::class, 'update']);
             Route::delete('terms/{term}', [TermController::class, 'destroy']);
           });


           Route::group(['middleware' => ['role:teacher'], 'prefix' => 'teacher'], function () {
             Route::get('cat1s', [Cat1Controller::class, 'index']);
             Route::post('cat1s', [Cat1Controller::class, 'store']);
             Route::PUT('cat1s/{id}', [Cat1Controller::class, 'update']);
             Route::delete('cat1s/{id}', [Cat1Controller::class, 'destroy']);
             Route::get('cat2s', [Cat2Controller::class, 'index']);
             Route::post('cat2s', [Cat2Controller::class, 'store']);
             Route::PUT('cat2s/{id}', [Cat2Controller::class, 'update']);
             Route::delete('cat2s/{id}', [Cat2Controller::class, 'destroy']);
             Route::get('cat3s', [Cat3Controller::class, 'index']);
             Route::post('cat3s', [Cat3Controller::class, 'store']);
             Route::PUT('cat3s/{id}', [Cat3Controller::class, 'update']);
             Route::delete('cat3s/{id}', [Cat3Controller::class, 'destroy']);
             Route::get('classes', [MyClassController::class, 'index']);
             Route::post('classes', [MyClassController::class, 'store']);
             Route::PUT('classes/{id}', [MyClassController::class, 'update']);
             Route::delete('classes/{id}', [MyClassController::class, 'destroy']);
             Route::get('classTypes', [ClassTypeController::class, 'index']);
             Route::post('classTypes', [ClassTypeController::class, 'store']);
             Route::PUT('classTypes/{id}', [ClassTypeController::class, 'update']);
             Route::delete('classTypes/{id}', [ClassTypeController::class, 'destroy']);
             Route::get('graduates', [GraduateController::class, 'index']);
             Route::post('graduates', [GraduateController::class, 'store']);
             Route::get('graduates/{id}', [GraduateController::class, 'show']);
             Route::PUT('graduates/{id}', [GraduateController::class, 'update']);
             Route::delete('graduates/{id}', [GraduateController::class, 'destroy']);
             Route::get('hostels', [HostelController::class, 'index']);
             Route::post('hostels', [HostelController::class, 'store']);
             Route::get('hostels/{id}', [HostelController::class, 'show']);
             Route::PUT('hostels/{id}', [HostelController::class, 'update']);
             Route::delete('hostels/{id}', [HostelController::class, 'destroy']);
             Route::get('promotions', [PromotionController::class, 'index']);
             Route::post('promotions', [PromotionController::class, 'store']);
             Route::get('promotions/{id}', [PromotionController::class, 'show']);
             Route::PUT('promotions/{id}', [PromotionController::class, 'update']);
             Route::delete('promotions/{id}', [PromotionController::class, 'destroy']);
             Route::get('repeats', [RepeatController::class, 'index']);
             Route::post('repeats', [RepeatController::class, 'store']);
             Route::get('repeats/{id}', [RepeatController::class, 'show']);
             Route::PUT('repeats/{id}', [RepeatController::class, 'update']);
             Route::delete('repeats/{id}', [RepeatController::class, 'destroy']);
             Route::get('reportcards', [ReportCardController::class, 'index']);
             Route::post('reportcards', [ReportCardController::class, 'store']);
             Route::PUT('reportcards/{id}', [ReportCardController::class, 'update']);
             Route::delete('reportcards/{id}', [ReportCardController::class, 'destroy']);
             Route::get('subjects', [SubjectController::class, 'index']);
             Route::post('subjects', [SubjectController::class, 'store']);
             Route::get('subjects/{subject}', [SubjectController::class, 'show']);
             Route::PUT('subjects/{subject}', [SubjectController::class, 'update']);
             Route::delete('subjects/{subject}', [SubjectController::class, 'destroy']);
             Route::post('/update-teacher', [TeacherProfileController::class, 'updateTeacher']);
           });


           Route::group(['middleware' => ['role:parent'], 'prefix' => 'parent'], function () {
            Route::post('/update-parent', [ParentProfileController::class, 'updateTeacher']);
           });


           Route::group(['middleware' => ['role:student'], 'prefix' => 'student'], function () {

            Route::get('/student-class', [ClassController::class, 'viewClass']);
            Route::get('/student-class/{id}', [ClassController::class, 'getClassById']);
            Route::get('/student-classtype', [StudentClassTypeController::class, 'getClassType']);
            Route::get('/student-reportcard', [StudentReportCardController::class, 'viewReportCard']);
            Route::get('/student-timetable', [StudentTimeTableController::class, 'getClassById']);
            Route::get('/student-hostel', [StudentHostelController::class, 'viewHostel']);
            Route::post('/update-student', [StudentProfileController::class, 'updateStudent']);

           });


  });


  Route::prefix('v1')->group(function() {
   
   

   Route::post('/contacts', [ContactController::class, 'store']);
   Route::put('/contacts/{contact}', [ContactController::class, 'update']);
   Route::delete('/contacts/{contact}', [ContactController::class, 'destroy']);

   Route::get('/settings', [SettingController::class, 'index']);
   Route::post('/settings/{setting}', [SettingController::class, 'update']);
 

  });
