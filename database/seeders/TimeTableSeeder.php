<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TimeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          \App\Models\TimeTable::factory(10)->create();
    }
}
