<?php

namespace Modules\Content\database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContentTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Content\app\Models\ContentType::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            "name" => "Content"
        ];
    }
}

