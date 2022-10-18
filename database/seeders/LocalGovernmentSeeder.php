<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class LocalGovernmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('local_governments')->insert([
            'name' => 'Irepodun',
             ]);
    
              DB::table('local_governments')->insert([
            'name' => 'Ifelodun',
             ]);
    
              DB::table('local_governments')->insert([
            'name' => 'Asa',
             ]);
    }
}
