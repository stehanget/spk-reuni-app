<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Location::factory(5)->create();
        \App\Models\University::factory(5)->create();
        \App\Models\Major::factory(10)->create();
        \App\Models\Alternative::factory(10)->create();   
    }
}
