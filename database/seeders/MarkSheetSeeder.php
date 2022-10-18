<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MarkSheetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\MarkSheet::factory(10)->create();
    }
}
