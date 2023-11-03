<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Video>
 */
class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $category = \App\Models\Category::pluck('category')->toArray();
        return [
                'category' => $category[array_rand($category)],
                'description' => $this->faker->text($maxNbChars = 50),
        ];
    }
}
