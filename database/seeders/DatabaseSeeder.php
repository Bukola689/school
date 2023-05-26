<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();

        $this->call([
            OccupationSeeder::class,
            CountrySeeder::class,
            StateSeeder::class,
            LocalGovernmentSeeder::class,
            RoleAndPermissionSeeder::class,
            UserSeeder::class,
            TeacherSeeder::class,
            StudentSeeder::class,
            MyParentSeeder::class,
            MyClassSeeder::class,
            ClassTypeSeeder::class,
            SubjectSeeder::class,
            TermSeeder::class,
            SessionSeeder::class,
            TimeTableSeeder::class,
            Cat1Seeder::class,
            Cat2Seeder::class,
            Cat3Seeder::class,
            ExaminationSeeder::class,
            MarkSheetSeeder::class,
            AttendanceSeeder::class,
            StaffRoomSeeder::class,
            HostelSeeder::class,
            GraduateSeeder::class,
            PromotionSeeder::class,
            RepeatSeeder::class,
            NoticeBoardSeeder::class,
            ReportCardSeeder::class,
        ]);
    }
}
