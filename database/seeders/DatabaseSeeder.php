<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Content\database\seeders\ContentDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            TruncateAllTables::class,
            UserSeeder::class,
            ContentDatabaseSeeder::class
        ]);
    }
}
