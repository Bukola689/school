<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NoticeBoardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Graduate::factory(1)->create();
    }
}
