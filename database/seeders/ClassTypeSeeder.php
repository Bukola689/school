<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ClassTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('class_types')->insert([
            'my_class_id' => '1',
            'name' => 'Science',
           ]);
    
           DB::table('class_types')->insert([
            'my_class_id' => '2',
            'name' => 'Art',
           ]);
    
           DB::table('class_types')->insert([
            'my_class_id' => '3',
            'name' => 'Commercial',
           ]);
    
    }
}
