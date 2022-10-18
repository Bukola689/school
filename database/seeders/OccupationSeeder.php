<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class OccupationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
             DB::table('occupations')->insert([
            'name' => 'STUDENT',
             ]);
    
              DB::table('occupations')->insert([
            'name' => 'TRADER',
             ]);
    
              DB::table('occupations')->insert([
            'name' => 'ENTERPRENURE',
             ]);
    
              DB::table('occupations')->insert([
            'name' => 'ENGLAND',
             ]);
    
    }
}
