<?php

namespace Database\Seeders;

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
         \App\Models\User::factory(5)->create();

    //    DB::table('users')->insert([
    //     'username' => 'bukola',
    //     'occupation_id' => '1',
    //     'country_id' => '2',
    //     'state_id' => '3',
    //     'local_government_id' => '5',
    //     'email' => 'jbukola95@gmail.com',
    //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
    //      ]);

    //      DB::table('users')->insert([
    //         'username' => 'jimoh',
    //         'occupation_id' => '2',
    //         'country_id' => '3',
    //         'state_id' => '4',
    //         'local_government_id' => '1',
    //         'email' => 'jbukola90@gmail.com',
    //         'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
    //          ]);

    //      DB::table('users')->insert([
    //     'username' => 'sulaimon',
    //     'occupation_id' => '2',
    //     'country_id' => '1',
    //     'state_id' => '4',
    //     'local_government_id' => '3',
    //     'email' => 'jbukola9@gmail.com',
    //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
    //      ]);

    }
}
