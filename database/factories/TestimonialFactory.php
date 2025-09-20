<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Testimonial;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Testimonial>
 */
class TestimonialFactory extends Factory
{
    protected $model = Testimonial::class;

    public function definition(): array
    {
        return [
            'student_name' => $this->faker->name(),
            'position' => $this->faker->optional()->jobTitle(), // bazen boş bırakır
            'image' => $this->faker->boolean(80)
                ? 'images/person-' . rand(1, 4) . '.jpg'
                : null,
            'comment' => $this->faker->paragraph(3),
            'stars' => $this->faker->numberBetween(3, 5), // 3-5 yıldız arası
        ];
    }
}
