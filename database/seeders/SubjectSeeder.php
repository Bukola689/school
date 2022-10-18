<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->insert([
            'class_type_id' => '1',
            'name' => 'Mathematics',
            'code' => 'mth',
         ]);

         DB::table('subjects')->insert([
            'class_type_id' => '1',
            'name' => 'English',
            'code' => 'Eng',
         ]);

         DB::table('subjects')->insert([
            'class_type_id' => '2',
            'name' => 'Compter',
            'code' => 'Com',
         ]);

         DB::table('subjects')->insert([
            'class_type_id' => '1',
            'name' => 'Agriculture',
            'code' => 'Agr',
         ]);

         DB::table('subjects')->insert([
            'class_type_id' => '2',
            'name' => 'Economics',
            'code' => 'Eco',
         ]);
    }
}
