<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HostelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Hostel::factory(10)->create();
    }
}
