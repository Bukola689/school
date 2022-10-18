<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class MyParentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\MyParent::factory(5)->create();

    //    DB::table('parents')->insert([
    //     'user_id' => '1',
    //     'age' => '70',
    //    ]);

    //    DB::table('parents')->insert([
    //     'user_id' => '2',
    //     'age' => '63',
    //    ]);

    //    DB::table('parents')->insert([
    //     'user_id' => '3',
    //     'age' => '58',
    //    ]);

    //    DB::table('parents')->insert([
    //     'user_id' => '4',
    //     'age' => '44',
    //    ]);
    }
}
