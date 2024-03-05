<?php

namespace Modules\Content\database\seeders;

use Illuminate\Database\Seeder;
use Modules\Content\app\Models\Content;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Content::factory()->count(50)->create();
    }
}
