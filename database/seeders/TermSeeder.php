<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('terms')->insert([
            'section' => '1st Term',
         ]);

         DB::table('terms')->insert([
            'section' => '2nd Term',
         ]);

         DB::table('terms')->insert([
            'section' => '3rd Term',
         ]);

    }
}
