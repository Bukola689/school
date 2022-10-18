<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ReportCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\ReportCard::factory(10)->create();
    }
}
