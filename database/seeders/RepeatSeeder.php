<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RepeatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Repeat::factory(10)->create();
    }
}
