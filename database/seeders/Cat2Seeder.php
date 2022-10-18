<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Cat2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Cat2::factory(10)->create();
    }
}
