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
                'title_of_video' => $this->faker->text($maxNbChars = 20),
                'description' => $this->faker->text($maxNbChars = 100),
                'video_image'=> 'img_' . $this->faker->numberBetween(1, 6),
                'views'=>  $this->faker->numberBetween(1, 9999),
                'user_id' => random_int(1, 6),
        ];
    }
}
