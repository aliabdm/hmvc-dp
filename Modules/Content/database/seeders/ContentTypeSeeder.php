<?php

namespace Modules\Content\database\seeders;

use Illuminate\Database\Seeder;
use Modules\Content\app\Models\ContentType;

class ContentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contentTypeNames = [
            'news',
            "opinions",
            "sport",
            "science",
            "gym",
            "cars",
            "motorcycle",
            "study",
            "articles",
            "cloth",
            "fashion",
            "weather",
            "social",
            "languages",
            "travel",
            "coffe"
        ];

        ContentType::factory()->count(16)->create();
        $contentTypes = ContentType::all();

        foreach ($contentTypes as $key => $contentType) {
            $contentType->name = $contentTypeNames[$key];
            $contentType->save();
        }

    }
}
