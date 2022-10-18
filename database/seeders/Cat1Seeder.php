<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Cat1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {\App\Models\Cat1::factory(10)->create();
         
    }
}
