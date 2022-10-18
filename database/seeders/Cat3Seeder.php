<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Cat3Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Cat3::factory(10)->create();
    }
}
