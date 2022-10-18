<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->insert([
            'name' => 'LAGOS',
             ]);
    
              DB::table('states')->insert([
            'name' => 'OGUN',
             ]);
    
              DB::table('states')->insert([
            'name' => 'IBADAN',
             ]);
    
              DB::table('states')->insert([
            'name' => 'CALIFONIA',
             ]);
    
              DB::table('states')->insert([
            'name' => 'TEXAS',
             ]);
    
             DB::table('states')->insert([
                'name' => 'LONDON',
            ]);
    }
}
