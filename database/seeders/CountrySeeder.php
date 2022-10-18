<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\Country::factory(10)->create();

         DB::table('countries')->insert([
        'name' => 'USA',
         ]);

          DB::table('countries')->insert([
        'name' => 'NIgeria',
         ]);

          DB::table('countries')->insert([
        'name' => 'NIGER',
         ]);

          DB::table('countries')->insert([
        'name' => 'ENGLAND',
         ]);

          DB::table('countries')->insert([
        'name' => 'SPAIN',
         ]);

         DB::table('countries')->insert([
            'name' => 'GERMANY',
        ]);

    }
}
