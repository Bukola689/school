<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Teacher::factory(8)->create();
        
    //    DB::table('teachers')->insert([
    //     'user_id' => '1',
    //     'qualification' => 'Masters',
    //    ]);

    //    DB::table('teachers')->insert([
    //     'user_id' => '2',
    //     'qualification' => 'Bsc',
    //    ]);

    //    DB::table('teachers')->insert([
    //     'user_id' => '3',
    //     'qualification' => 'Hnd',
    //    ]);

    //    DB::table('teachers')->insert([
    //     'user_id' => '4',
    //     'qualification' => 'Ond',
    //    ]);

    }
}
