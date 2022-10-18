<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\Session::factory(10)->create();

      //   DB::table('terms')->insert([
      //       'sec_year' => '2000/2001',
      //    ]);
         
      //    DB::table('sessions')->insert([
      //       'sec_year' => '2001/2002',
      //    ]);

      //    DB::table('sessions')->insert([
      //       'sec_year' => '2002/2003',
      //    ]);

      //    DB::table('sessions')->insert([
      //       'sec_year' => '2003/2004',
      //    ]);

      //    DB::table('sessions')->insert([
      //       'sec_year' => '2004/2005',
      //    ]);
    }
}
