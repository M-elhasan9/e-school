<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
   public function definition(): array
{
    return [
        'title' => $this->faker->sentence(),
        'content' => $this->faker->paragraph(5),
        'image' => 'images/image_'.rand(1,6).'.jpg',
    'author' => $this->faker->name,
        'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'), // rastgele tarih
    'updated_at' => now(),
    ];
}

}
