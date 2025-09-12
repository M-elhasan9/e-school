<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
         return [
            'title' => $this->faker->sentence(4), // 4 kelimelik başlık
            'description' => $this->faker->paragraph(4),
            'image' => 'Course/work_'.rand(1,9).'.jpg',
            'duration' => $this->faker->randomElement([
                '2 weeks', '1 month', '3 months', '6 weeks'
            ]),
            'price' => $this->faker->randomFloat(2, 0, 200), // 0.00 - 200.00
            'status' => $this->faker->randomElement(['active', 'draft', 'archived']),
            'is_featured' => $this->faker->boolean(20), // %20 featured
            'enrolled_students' => $this->faker->numberBetween(0, 100),
        ];
    }
}
