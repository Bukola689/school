<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ExaminationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Examination::factory(10)->create();
    }
}
