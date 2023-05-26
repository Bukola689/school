<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            // reset cached roles and permissions
            app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

            $accessUser = 'access-user';
            $storeUser = 'store-user';
            $viewUser = 'view-user';
            $updateUser = 'update-user';
            $deleteUser = 'delete-user';
    
            $accessOccupation = 'access occupation';
            $storeOccupation = 'store occupation';
            $viewOccupation = 'view-occupation';
            $updateOccupation = 'update occupation';
            $deleteOccupation = 'delete occupation';
    
            $accessCountry = 'access country';
            $storeCountry = 'store country';
            $viewCountry = 'view-country';
            $updateCountry = 'update country';
            $deleteCountry = 'delete country';
    
            $accessState = 'access-state';
            $storeState = 'store-state';
            $viewState = 'view-state';
            $updateState = 'update-state';
            $deleteState = 'delete-state';

            $accessLga = 'access-lga';
            $storeLga = 'store-lga';
            $viewLga = 'view-lga';
            $updateLga = 'update-lga';
            $deleteLga = 'delete-lga';

            $accessTeacher = 'access-teacher';
            $storeTeacher = 'store-teacher';
            $viewTeacher = 'view-teacher';
            $updateTeacher = 'update-teacher';
            $deleteTeacher = 'delete-teacher';

            $accessParent = 'access parent';
            $storeParent = 'store parent';
            $viewParent = 'view-parent';
            $updateParent = 'update parent';
            $deleteParent = 'delete parent';

            $accessStudent = 'access student';
            $storeStudent = 'store student';
            $viewStudent = 'view-student';
            $updateStudent = 'update student';
            $deleteStudent = 'delete student';

            $accessClass = 'access class';
            $storeClass = 'store class';
            $viewClass = 'view-class';
            $updateClass = 'update class';
            $deleteClass = 'delete class';

            $accessClassType = 'access classtype';
            $storeClassType = 'store classtype';
            $viewClassType = 'view-classtype';
            $updateClassType = 'update classtype';
            $deleteClassType = 'delete classtype';

            $accessSubject = 'access subject';
            $storeSubject = 'store subject';
            $viewSubject = 'view-subject';
            $updateSubject = 'update subject';
            $deleteSubject = 'delete subject';

            $accessTerm = 'access term';
            $storeTerm = 'store term';
            $viewTerm = 'view-term';
            $updateTerm = 'update term';
            $deleteTerm = 'delete term';

            $accessSession = 'access session';
            $storeSession = 'store session';
            $viewSession = 'view-session';
            $updateSession = 'update session';
            $deleteSession = 'delete session';

            $accessTimetable = 'access-timetable';
            $storeTimetable = 'store-timetable';
            $ViewTimetable = 'view-timetable';
            $updateTimetable = 'update-timetable';
            $deleteTimetable = 'delete-timetable';

            $accessCat1 = 'access-cat1';
            $storeCat1 = 'store-cat1';
            $viewCat1 = 'view-cat1';
            $updateCat1 = 'update-cat1';
            $deleteCat1 = 'delete-cat1';

            $accessCat2 = 'access-cat2';
            $storeCat2 = 'store-cat2';
            $viewCat2 = 'view-cat2';
            $updateCat2 = 'update-cat2';
            $deleteCat2 = 'delete-cat2';

            $accessCat3 = 'access-cat3';
            $storeCat3 = 'store-cat3';
            $viewCat3 = 'view-cat3';
            $updateCat3 = 'update-cat3';
            $deleteCat3 = 'delete-cat3';

            $accessExamination= 'access-examination';
            $storeExamination= 'store-examination';
            $viewExamination = 'view-examination';
            $updateExamination= 'update-examination';
            $deleteExamination= 'delete-examination';

            $accessMarksheet = 'access marksheet';
            $storeMarksheet = 'store marksheet';
            $viewMarksheet = 'view-marksheet';
            $updateMarksheet = 'update marksheet';
            $deleteMarksheet = 'delete marksheet';

            $accessAttendance = 'access attendance';
            $storeAttendance = 'store attendance';
            $viewAttendance = 'view-attendance';
            $updateAttendance = 'update attendance';
            $deleteAttendance = 'delete attendance';

            $accessStaffRoom = 'access staffroom';
            $storeStaffRoom = 'store staffroom';
            $viewStaffroom = 'view-staffroom';
            $updateStaffRoom = 'update staffroom';
            $deleteStaffRoom = 'delete staffroom';

            $accessHostel = 'access hostel';
            $storeHostel = 'store hostel';
            $viewHostel = 'view-hostel';
            $updateHostel = 'update hostel';
            $deleteHostel = 'delete hostel';

            $accessGraduate = 'access graduate';
            $storeGraduate = 'store graduate';
            $viewGraduate = 'view-graduate';
            $updateGraduate = 'update graduate';
            $deleteGraduate = 'delete graduate';

            $accessPromotion = 'access promotion';
            $storePromotion = 'store promotion';
            $viewPromotion = 'view-promotion';
            $updatePromotion = 'update promotion';
            $deletePromotion = 'delete promotion';

            $accessRepeat = 'access repeat';
            $storeRepeat = 'store repeat';
            $viewRepeat = 'view-repeat';
            $updateRepeat = 'update repeat';
            $deleteRepeat = 'delete repeat';

            $accessNoticeBoard = 'access noticeboard';
            $storeNoticeBoard = 'store noticeboard';
            $viewNoticeboard = 'view-noticeboard';
            $updateNoticeBoard = 'update noticeboard';
            $deleteNoticeBoard = 'delete noticeboard';

            $accessReportCard = 'access reportcard';
            $storeReportCard = 'store reportcard';
            $viewReportCard = 'view-reportcard';
            $updateReportCard = 'update reportcard';
            $deleteReportCard = 'delete reportcard';

            $ViewClass = ' viewclass';

            $GetClassById = 'getClassById';

            $StudentClassType = 'student-classtype';

            $StudentTimeTable = 'student-timetable';

            $StudentHostel = 'student-hostel';

            $ParentProfile = 'parent-profile';
            $TeacherProfile = 'teacher-profile';
            $StudentProfile = 'student-profile';

            $UpdateParent = 'update-parent';
            $UpdateTeacher = 'update teacher';
            $UpdateStudent = 'update-student';
    
            $ChangePassword = 'change-password';
    
            //user permisssion..//
            Permission::create(['name' => $accessUser]);
            Permission::create(['name' => $storeUser]);
            Permission::create(['name' => $viewUser]);
            Permission::create(['name' => $updateUser]);
            Permission::create(['name' => $deleteUser]);
    
            Permission::create(['name' => $accessOccupation]);
            Permission::create(['name' => $storeOccupation]);
            Permission::create(['name' => $viewOccupation]);
            Permission::create(['name' => $updateOccupation]);
            Permission::create(['name' => $deleteOccupation]);
    
            Permission::create(['name' => $accessCountry]);
            Permission::create(['name' => $storeCountry]);
            Permission::create(['name' => $viewCountry]);
            Permission::create(['name' => $updateCountry]);
            Permission::create(['name' => $deleteCountry]);
    
            Permission::create(['name' => $accessState]);
            Permission::create(['name' => $storeState]);
            Permission::create(['name' => $viewState]);
            Permission::create(['name' => $updateState]);
            Permission::create(['name' => $deleteState]);

            Permission::create(['name' => $accessLga]);
            Permission::create(['name' => $storeLga]);
            Permission::create(['name' => $viewLga]);
            Permission::create(['name' => $updateLga]);
            Permission::create(['name' => $deleteLga]);
    
            Permission::create(['name' => $accessTeacher]);
            Permission::create(['name' => $storeTeacher]);
            Permission::create(['name' => $viewTeacher]);
            Permission::create(['name' => $updateTeacher]);
            Permission::create(['name' => $deleteTeacher]);

            Permission::create(['name' => $accessParent]);
            Permission::create(['name' => $storeParent]);
            Permission::create(['name' => $viewParent]);
            Permission::create(['name' => $updateParent]);
            Permission::create(['name' => $deleteParent]);

            Permission::create(['name' => $accessStudent]);
            Permission::create(['name' => $storeStudent]);
            Permission::create(['name' => $viewStudent]);
            Permission::create(['name' => $updateStudent]);
            Permission::create(['name' => $deleteStudent]);

            Permission::create(['name' => $accessClass]);
            Permission::create(['name' => $storeClass]);
            Permission::create(['name' => $viewClass]);
            Permission::create(['name' => $updateClass]);
            Permission::create(['name' => $deleteClass]);

            Permission::create(['name' => $accessClassType]);
            Permission::create(['name' => $storeClassType]);
            Permission::create(['name' => $viewClassType]);
            Permission::create(['name' => $updateClassType]);
            Permission::create(['name' => $deleteClassType]);

            Permission::create(['name' => $accessSubject]);
            Permission::create(['name' => $storeSubject]);
            Permission::create(['name' => $viewSubject]);
            Permission::create(['name' => $updateSubject]);
            Permission::create(['name' => $deleteSubject]);

            Permission::create(['name' => $accessTerm]);
            Permission::create(['name' => $storeTerm]);
            Permission::create(['name' => $viewTerm]);
            Permission::create(['name' => $updateTerm]);
            Permission::create(['name' => $deleteTerm]);

            Permission::create(['name' => $accessSession]);
            Permission::create(['name' => $storeSession]);
            Permission::create(['name' => $viewSession]);
            Permission::create(['name' => $updateSession]);
            Permission::create(['name' => $deleteSession]);

            Permission::create(['name' => $accessTimetable]);
            Permission::create(['name' => $storeTimetable]);
            Permission::create(['name' => $ViewTimetable]);
            Permission::create(['name' => $updateTimetable]);
            Permission::create(['name' => $deleteTimetable]);

            Permission::create(['name' => $accessCat1]);
            Permission::create(['name' => $storeCat1]);
            Permission::create(['name' => $viewCat1]);
            Permission::create(['name' => $updateCat1]);
            Permission::create(['name' => $deleteCat1]);

            Permission::create(['name' => $accessCat2]);
            Permission::create(['name' => $storeCat2]);
            Permission::create(['name' => $viewCat2]);
            Permission::create(['name' => $updateCat2]);
            Permission::create(['name' => $deleteCat2]);

            Permission::create(['name' => $accessCat3]);
            Permission::create(['name' => $storeCat3]);
            Permission::create(['name' => $viewCat3]);
            Permission::create(['name' => $updateCat3]);
            Permission::create(['name' => $deleteCat3]);

            Permission::create(['name' => $accessExamination]);
            Permission::create(['name' => $storeExamination]);
            Permission::create(['name' => $viewExamination]);
            Permission::create(['name' => $updateExamination]);
            Permission::create(['name' => $deleteExamination]);

            Permission::create(['name' => $accessMarksheet]);
            Permission::create(['name' => $storeMarksheet]);
            Permission::create(['name' => $viewMarksheet]);
            Permission::create(['name' => $updateMarksheet]);
            Permission::create(['name' => $deleteMarksheet]);

            Permission::create(['name' => $accessAttendance]);
            Permission::create(['name' => $storeAttendance]);
            Permission::create(['name' => $viewAttendance]);
            Permission::create(['name' => $updateAttendance]);
            Permission::create(['name' => $deleteAttendance]);

            Permission::create(['name' => $accessStaffRoom]);
            Permission::create(['name' => $storeStaffRoom]);
            Permission::create(['name' => $viewStaffroom]);
            Permission::create(['name' => $updateStaffRoom]);
            Permission::create(['name' => $deleteStaffRoom]);

            Permission::create(['name' => $accessHostel]);
            Permission::create(['name' => $storeHostel]);
            Permission::create(['name' => $viewHostel]);
            Permission::create(['name' => $updateHostel]);
            Permission::create(['name' => $deleteHostel]);

            Permission::create(['name' => $accessGraduate]);
            Permission::create(['name' => $storeGraduate]);
            Permission::create(['name' => $viewGraduate]);
            Permission::create(['name' => $updateGraduate]);
            Permission::create(['name' => $deleteGraduate]);

            Permission::create(['name' => $accessPromotion]);
            Permission::create(['name' => $storePromotion]);
            Permission::create(['name' => $viewPromotion]);
            Permission::create(['name' => $updatePromotion]);
            Permission::create(['name' => $deletePromotion]);

            Permission::create(['name' => $accessRepeat]);
            Permission::create(['name' => $storeRepeat]);
            Permission::create(['name' => $viewRepeat]);
            Permission::create(['name' => $updateRepeat]);
            Permission::create(['name' => $deleteRepeat]);

            Permission::create(['name' => $accessNoticeBoard]);
            Permission::create(['name' => $storeNoticeBoard]);
            Permission::create(['name' => $viewNoticeboard]);
            Permission::create(['name' => $updateNoticeBoard]);
            Permission::create(['name' => $deleteNoticeBoard]);

            Permission::create(['name' => $accessReportCard]);
            Permission::create(['name' => $storeReportCard]);
            Permission::create(['name' => $viewReportCard]);
            Permission::create(['name' => $updateReportCard]);
            Permission::create(['name' => $deleteReportCard]);

            Permission::create(['name' => $ViewClass]);
            Permission::create(['name' => $GetClassById]);


            Permission::create(['name' => $StudentClassType]);
            Permission::create(['name' => $StudentTimeTable]);

            Permission::create(['name' => $StudentHostel]);
    
            Permission::create(['name' => $ParentProfile]);
            Permission::create(['name' => $StudentProfile]);
            Permission::create(['name' => $TeacherProfile]);

            Permission::create(['name' => $UpdateParent]);
            Permission::create(['name' => $UpdateStudent]);
            Permission::create(['name' => $UpdateTeacher]);
    
            Permission::create(['name' => $ChangePassword]);
    
              //...Roles...//
    
              $admin = 'admin';
              $teacher = 'teacher';
              $student = 'student';
              $parent = 'parent';
 
          Role::create(['name' => $admin])->givePermissionTo(Permission::all());
    
    
            Role::create(['name' => $teacher])->givePermissionTo([
                
                $accessCat1,
                $storeCat1,
                $viewCat1,
                $updateCat1,
                $deleteCat1,
                $accessCat2,
                $storeCat2,
                $viewCat2,
                $updateCat2,
                $deleteCat2,
                $accessCat3,
                $storeCat3,
                $viewCat3,
                $updateCat3,
                $deleteCat3,
                $accessExamination,
                $storeExamination,
                $viewExamination,
                $updateExamination,
                $deleteExamination,
                $accessMarksheet,
                $storeMarksheet,
                $viewMarksheet,
                $updateMarksheet,
                $deleteMarksheet,
                $accessAttendance,
                $storeAttendance,
                $viewAttendance,
                $updateAttendance,
                $deleteAttendance,
                $accessGraduate,
                $storeGraduate,
                $viewGraduate,
                $updateGraduate,
                $deleteGraduate,
                $accessPromotion,
                $storePromotion,
                $viewPromotion,
                $updatePromotion,
                $deletePromotion,
                $accessRepeat,
                $storeRepeat,
                $viewRepeat,
                $updateRepeat,
                $deleteRepeat,
                $accessReportCard,
                $storeReportCard,
                $viewReportCard,
                $updateReportCard,
                $deleteReportCard,
                $GetClassById,
                $StudentClassType,
                $StudentTimeTable,
                $StudentHostel,
                $ParentProfile,
                $TeacherProfile,
                $StudentProfile,
                $UpdateTeacher,
    
            ]);
    
            Role::create(['name' => $student])->givePermissionTo([
                $viewAttendance,
                $ViewClass,
                $GetClassById,
                $StudentClassType,
                $StudentTimeTable,
                $StudentHostel,
                $ParentProfile,
                $TeacherProfile,
                $StudentProfile,
                $UpdateStudent,
            ]);

            Role::create(['name' => $parent])->givePermissionTo([

                $ParentProfile,
                $TeacherProfile,
                $StudentProfile,
            ]);

    }
}
