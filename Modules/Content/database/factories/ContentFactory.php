<?php

namespace Modules\Content\database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Content\app\Models\ContentType;

class ContentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Content\app\Models\Content::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'text'=> $this->faker->paragraphs(3, true),
            "content_type_id" => ContentType::inRandomOrder()->limit(1)->first()->id
        ];
    }
}

