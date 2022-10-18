<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StaffRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\StaffRoom::factory(10)->create();
    }
}
