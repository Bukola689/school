<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(5)->create();

         User::factory()->count(2)->create()->each(
            function($user) {
                $user->assignRole('admin');
            }
        );

        User::factory()->count(3)->create()->each(
            function($user) {
                $user->assignRole('teacher');
            }
        );

        User::factory()->count(4)->create()->each(
            function($user) {
                $user->assignRole('student');
            }
        );

          User::factory()->count(5)->create()->each(
            function($user) {
                $user->assignRole('parent');
            }
        );
    }
}
