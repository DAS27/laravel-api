<?php

namespace Database\Seeders;

use App\Models\Document;
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
         Document::factory(5)->create();
    }
}
