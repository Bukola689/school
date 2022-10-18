<?php

use Illuminate\Http\Request;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\OccupationController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\LocalGovernmentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\MyClassController;
use App\Http\Controllers\ClassTypeController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TermController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TimeTableController;
use App\Http\Controllers\Cat1Controller;
use App\Http\Controllers\Cat2Controller;
use App\Http\Controllers\Cat3Controller;
use App\Http\Controllers\ExaminationController;
use App\Http\Controllers\MarkSheetController;
use App\Http\Controllers\Admin\AttendanceController;
use App\Http\Controllers\StaffRoomController;
use App\Http\Controllers\Auth\HostelController;
use App\Http\Controllers\GraduateController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\RepeatController;
use App\Http\Controllers\NoticeBoardController;
use App\Http\Controllers\ReportCardController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\StudentHostelController;
use App\Http\Controllers\Auth\StudentClassTypeController;
use App\Http\Controllers\Auth\StudentReportCardController;
use App\Http\Controllers\Auth\StudentTimeTableController;
use App\Http\Controllers\Auth\StudentProfileController;
use App\Http\Controllers\Auth\ParentProfileController;
use App\Http\Controllers\Auth\ClassController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\UserController;
use App\Models\NoticeBoard;
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

Route::get('users', [UserController::class, 'index']);
Route::post('users', [UserController::class, 'store']);
Route::get('users/{user}', [UserController::class, 'show']);
Route::PUT('users/{user}', [UserController::class, 'update']);
Route::delete('users/{user}', [UserController::class, 'destroy']);

Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [LoginController::class, 'login']);
Route::get('logout', [LogoutController::class, 'logout'])->middleware('auth:sanctum');

Route::get('occupations', [OccupationController::class, 'index']);
Route::post('occupations', [OccupationController::class, 'store']);
Route::get('occupations/{occupation}', [OccupationController::class, 'show']);
Route::PUT('occupations/{occupation}', [OccupationController::class, 'update']);
Route::delete('occupations/{occupation}', [OccupationController::class, 'destroy']);

Route::get('countries', [CountryController::class, 'index']);
Route::post('countries', [CountryController::class, 'store']);
Route::get('countries/{country}', [CountryController::class, 'show']);
Route::PUT('countries/{country}', [CountryController::class, 'update']);
Route::delete('countries/{country}', [CountryController::class, 'destroy']);

Route::get('states', [StateController::class, 'index']);
Route::post('states', [StateController::class, 'store']);
Route::get('states/{state}', [StateController::class, 'show']);
Route::PUT('states/{state}', [StateController::class, 'update']);
Route::delete('states/{state}', [StateController::class, 'destroy']);

Route::get('localGovernments', [LocalGovernmentController::class, 'index']);
Route::post('localGovernments', [LocalGovernmentController::class, 'store']);
Route::get('localGovernments/{localGovernment}', [LocalGovernmentController::class, 'show']);
Route::PUT('localGovernments/{localGovernment}', [LocalGovernmentController::class, 'update']);
Route::delete('localGovernments/{localGovernment}', [LocalGovernmentController::class, 'destroy']);

Route::get('teachers', [TeacherController::class, 'index']);
Route::post('teachers', [TeacherController::class, 'store']);
Route::get('teachers/{teacher}', [TeacherController::class, 'show']);
Route::PUT('teachers/{teacher}', [TeacherController::class, 'update']);
Route::delete('teachers/{teacher}', [TeacherController::class, 'destroy']);

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

Route::get('classes', [MyClassController::class, 'index']);
Route::post('classes', [MyClassController::class, 'store']);
Route::get('classes/{myClass}', [MyClassController::class, 'show']);
Route::PUT('classes/{myClass}', [MyClassController::class, 'update']);
Route::delete('classes/{myClass}', [MyClassController::class, 'destroy']);

Route::get('classTypes', [ClassTypeController::class, 'index']);
Route::post('classTypes', [ClassTypeController::class, 'store']);
Route::get('classTypes/{classType}', [ClassTypeController::class, 'show']);
Route::PUT('classTypes/{classType}', [ClassTypeController::class, 'update']);
Route::delete('classTypes/{classType}', [ClassTypeController::class, 'destroy']);

Route::get('subjects', [SubjectController::class, 'index']);
Route::post('subjects', [SubjectController::class, 'store']);
Route::get('subjects/{subject}', [SubjectController::class, 'show']);
Route::PUT('subjects/{subject}', [SubjectController::class, 'update']);
Route::delete('subjects/{subject}', [SubjectController::class, 'destroy']);

Route::get('terms', [TermController::class, 'index']);
Route::post('terms', [TermController::class, 'store']);
Route::get('terms/{term}', [TermController::class, 'show']);
Route::PUT('terms/{term}', [TermController::class, 'update']);
Route::delete('terms/{term}', [TermController::class, 'destroy']);

Route::get('sessions', [SessionController::class, 'index']);
Route::post('sessions', [SessionController::class, 'store']);
Route::get('sessions/{session}', [SessionController::class, 'show']);
Route::PUT('sessions/{session}', [SessionController::class, 'update']);
Route::delete('sessions/{session}', [SessionController::class, 'destroy']);

Route::get('timeTables', [TimeTableController::class, 'index']);
Route::post('timeTables', [TimeTableController::class, 'store']);
Route::get('timeTables/{timeTable}', [TimeTableController::class, 'show']);
Route::PUT('timeTables/{timeTable}', [TimeTableController::class, 'update']);
Route::delete('timeTables/{timeTable}', [TimeTableController::class, 'destroy']);

Route::get('cat1s', [Cat1Controller::class, 'index']);
Route::post('cat1s', [Cat1Controller::class, 'store']);
Route::get('cat1s/{cat1}', [Cat1Controller::class, 'show']);
Route::PUT('cat1s/{cat1}', [Cat1Controller::class, 'update']);
Route::delete('cat1s/{cat1}', [Cat1Controller::class, 'destroy']);

Route::get('cat2s', [Cat2Controller::class, 'index']);
Route::post('cat2s', [Cat2Controller::class, 'store']);
Route::get('cat2s/{cat2}', [Cat2Controller::class, 'show']);
Route::PUT('cat2s/{cat2}', [Cat2Controller::class, 'update']);
Route::delete('cat2s/{cat2}', [Cat2Controller::class, 'destroy']);

Route::get('cat3s', [Cat3Controller::class, 'index']);
Route::post('cat3s', [Cat3Controller::class, 'store']);
Route::get('cat3s/{cat3}', [Cat3Controller::class, 'show']);
Route::PUT('cat3s/{cat3}', [Cat3Controller::class, 'update']);
Route::delete('cat3s/{cat3}', [Cat3Controller::class, 'destroy']);

Route::get('examinations', [ExaminationController::class, 'index']);
Route::post('examinations', [ExaminationController::class, 'store']);
Route::get('examinations/{examination}', [ExaminationController::class, 'show']);
Route::PUT('examinations/{examination}', [ExaminationController::class, 'update']);
Route::delete('examinations/{examination}', [ExaminationController::class, 'destroy']);

Route::get('markSheets', [MarkSheetController::class, 'index']);
Route::post('markSheets', [MarkSheetController::class, 'store']);
Route::get('markSheets/{markSheet}', [MarkSheetController::class, 'show']);
Route::PUT('markSheets/{markSheet}', [MarkSheetController::class, 'update']);
Route::delete('markSheets/{markSheet}', [MarkSheetController::class, 'destroy']);

Route::get('attendances', [AttendanceController::class, 'index']);
Route::post('attendances', [AttendanceController::class, 'store']);
Route::get('attendances/{attendance}', [AttendanceController::class, 'show']);
Route::PUT('attendances/{attendance}', [AttendanceController::class, 'update']);
Route::delete('attendances/{attendance}', [AttendanceController::class, 'destroy']);
Route::get('attendances/{attendance}', [AttendanceController::class, 'status']);

Route::get('staffRooms', [StaffRoomController::class, 'index']);
Route::post('staffRooms', [StaffRoomController::class, 'store']);
Route::get('staffRooms/{staffRoom}', [StaffRoomController::class, 'show']);
Route::PUT('staffRooms/{staffRoom}', [StaffRoomController::class, 'update']);
Route::delete('staffRooms/{staffRoom}', [StaffRoomController::class, 'destroy']);

Route::get('hostels', [HostelController::class, 'index']);
Route::post('hostels', [HostelController::class, 'store']);
Route::get('hostels/{hostel}', [HostelController::class, 'show']);
Route::PUT('hostels/{hostel}', [HostelController::class, 'update']);
Route::delete('hostels/{hostel}', [HostelController::class, 'destroy']);

Route::get('graduates', [GraduateController::class, 'index']);
Route::post('graduates', [GraduateController::class, 'store']);
Route::get('graduates/{graduate}', [GraduateController::class, 'show']);
Route::PUT('graduates/{graduate}', [GraduateController::class, 'update']);
Route::delete('graduates/{graduate}', [GraduateController::class, 'destroy']);

Route::get('promotions', [PromotionController::class, 'index']);
Route::post('promotions', [PromotionController::class, 'store']);
Route::get('promotions/{promotion}', [PromotionController::class, 'show']);
Route::PUT('promotions/{promotion}', [PromotionController::class, 'update']);
Route::delete('promotions/{promotion}', [PromotionController::class, 'destroy']);

Route::get('repeats', [RepeatController::class, 'index']);
Route::post('repeats', [RepeatController::class, 'store']);
Route::get('repeats/{repeat}', [RepeatController::class, 'show']);
Route::PUT('repeats/{repeat}', [RepeatController::class, 'update']);
Route::delete('repeats/{repeat}', [RepeatController::class, 'destroy']);

Route::get('noticeBoards', [NoticeBoardController::class, 'index']);
Route::post('noticeBoards', [NoticeBoardController::class, 'store']);
Route::get('noticeBoards/{noticeBoard}', [NoticeBoardController::class, 'show']);
Route::PUT('noticeBoards/{noticeBoard}', [NoticeBoardController::class, 'update']);
Route::delete('noticeBoards/{noticeBoard}', [NoticeBoardController::class, 'destroy']);

Route::get('reportCards', [ReportCardController::class, 'index']);
Route::post('reportCards', [ReportCardController::class, 'store']);
Route::get('reportCards/{reportCard}', [ReportCardController::class, 'show']);
Route::PUT('reportCards/{reportCard}', [ReportCardController::class, 'update']);
Route::delete('reportCards/{reportCard}', [ReportCardController::class, 'destroy']);

Route::group(['middleware' => ['auth:sanctum']], function () { 
 
     //...student class..//
  Route::get('/student-class', [ClassController::class, 'viewClass']);
  Route::get('/student-class/{id}', [ClassController::class, 'getClassById']);

  //..student classtype..//
  Route::get('/student-classtype', [StudentClassTypeController::class, 'getClassType']);
  Route::get('/student-classtypeClass/{id}', [StudentClassTypeController::class, 'getClassTypeByClass']);

  //... user_id  Report Card...//
   Route::get('/student-reportcard', [StudentReportCardController::class, 'viewReportCard']);

  //....stdent TimeTable..//
   Route::get('/student-timetable', [StudentTimeTableController::class, 'getClassById']);

  //...student..//
   Route::get('/student-hostel', [StudentHostelController::class, 'viewHostel']);
   //Route::get('/student-hostel', [StudentHostelController::class, 'getClassById']);

   Route::get('/parent-profiles', [ParentProfileController::class, 'parentProfile']);
   Route::post('/update-parent', [ParentProfileController::class, 'updateTeacher']);

   Route::get('/student-profiles', [StudentProfileController::class, 'studentProfile']);
   Route::post('/update-student', [StudentProfileController::class, 'updateStudent']);

   Route::get('/teacher-profiles', [TeacherProfileController::class, 'teacherProfile']);
   Route::post('/update-teacher', [TeacherProfileController::class, 'updateTeacher']);

   Route::post('/contacts', [ContactController::class, 'store']);
   Route::put('/contacts/{contact}', [ContactController::class, 'update']);
   Route::delete('/contacts/{contact}', [ContactController::class, 'destroy']);

   Route::get('/settings', [SettingController::class, 'index']);
   Route::put('/settings/{setting}', [SettingController::class, 'update']);
 
 });

