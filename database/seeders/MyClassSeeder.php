<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class MyClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      //\App\Models\MyClass::factory(10)->create();
      
      DB::table('my_classes')->insert([
         'name' => 'jss1',
       ]);

       DB::table('my_classes')->insert([
        'name' => 'jss2',
       ]);

       DB::table('my_classes')->insert([
        'name' => 'jss3',
       ]);

       DB::table('my_classes')->insert([
        'name' => 'ss1',
       ]);

       DB::table('my_classes')->insert([
        'name' => 'ss2',
       ]);

       DB::table('my_classes')->insert([
        'name' => 'ss3',
       ]);
   }
}